<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class CheckoutController extends Controller
{
public function store(Request $request)
{
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'country' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'postal_code' => 'required|string|max:20',
        'payment_method' => 'required|in:cod,credit_card,paypal',
        'subtotal' => 'required|numeric|min:0',
        'tax' => 'required|numeric|min:0',
        'shipping' => 'required|numeric|min:0',
        'total' => 'required|numeric|min:0',
        'items' => 'required|array',
        'items.*.product_id' => 'required|exists:products,id',
        'items.*.quantity' => 'required|integer|min:1',
        'items.*.price' => 'required|numeric|min:0',
    ]);

    try {
        DB::beginTransaction();

        $order = Order::create([
            'user_id' => Auth::id(),
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'status' => 'pending',
            'grand_total' => $validated['total'],
            'item_count' => count($validated['items']),
            'payment_method' => $validated['payment_method'],
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'country' => $validated['country'],
            'postal_code' => $validated['postal_code'],
            'notes' => $request->input('notes'),
        ]);

        foreach ($validated['items'] as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }
        Cart::where('user_id', Auth::id())->delete();
        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'Order placed successfully',
            'order_id' => $order->id,
            'order_number' => $order->order_number,
        ]);

    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json([
            'success' => false,
            'message' => 'Order processing failed: ' . $e->getMessage(),
        ], 500);
    }
}
}
