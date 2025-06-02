<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1|max:100'
        ]);

        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Please login to add items to cart'
            ], 401);
        }

        $user = Auth::user();

        // Check if user is admin
        if ($user->role === 1) {
            return response()->json([
                'success' => false,
                'message' => 'Admins cannot add items to cart'
            ], 403);
        }

        $product = Product::findOrFail($request->product_id);

        // Check product availability
        if ($product->quantity < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Only ' . $product->quantity . ' items available in stock'
            ], 400);
        }

        // Check existing cart item
        $existingCartItem = Cart::where('user_id', $user->id)
                              ->where('product_id', $request->product_id)
                              ->first();

        if ($existingCartItem) {
            $newQuantity = $existingCartItem->quantity + $request->quantity;
            
            if ($newQuantity > $product->quantity) {
                $available = $product->quantity - $existingCartItem->quantity;
                return response()->json([
                    'success' => false,
                    'message' => 'You can only add ' . $available . ' more of this item'
                ], 400);
            }
            
            $existingCartItem->update(['quantity' => $newQuantity]);
            
            return response()->json([
                'success' => true,
                'message' => 'Cart quantity updated',
                'new_quantity' => $newQuantity
            ]);
        }

        // Create new cart item
        $cartItem = Cart::create([
            'user_id' => $user->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'price' => $product->price
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart',
            'cart_item' => $cartItem
        ]);
    }

    public function getCartCount()
    {
        $count = Auth::check() 
            ? Cart::where('user_id', Auth::id())->sum('quantity') 
            : 0;
            
        return response()->json(['count' => $count]);
    }

    public function getCartItems()
    {
        if (!Auth::check()) {
            return response()->json(['items' => []]);
        }

        $items = Cart::with(['product' => function($query) {
                $query->select('id', 'name', 'image', 'price');
            }])
            ->where('user_id', Auth::id())
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'product' => $item->product,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'total' => $item->price * $item->quantity
                ];
            });

        return response()->json(['items' => $items]);
    }
    public function updateQuantity(Request $request, $cartId)
{
    $request->validate([
        'quantity' => 'required|integer|min:1|max:100'
    ]);

    $cartItem = Cart::where('user_id', Auth::id())
                   ->where('id', $cartId)
                   ->firstOrFail();

    $product = Product::findOrFail($cartItem->product_id);

    if ($request->quantity > $product->quantity) {
        return response()->json([
            'success' => false,
            'message' => 'Only ' . $product->quantity . ' items available in stock'
        ], 400);
    }

    $cartItem->update(['quantity' => $request->quantity]);

    return response()->json([
        'success' => true,
        'message' => 'Quantity updated',
        'new_quantity' => $request->quantity,
        'new_total' => $cartItem->price * $request->quantity
    ]);
}

public function removeFromCart($cartId)
{
    $cartItem = Cart::where('user_id', Auth::id())
                   ->where('id', $cartId)
                   ->firstOrFail();

    $cartItem->delete();

    return response()->json([
        'success' => true,
        'message' => 'Item removed from cart'
    ]);
}
public function clear()
{
    try {
        // Delete all cart items for current user
        $cart = Cart::where('user_id', auth()->id());
      
$cart->delete();
        return response()->json([
            'success' => true,
            'message' => 'Cart cleared successfully',
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to clear cart: ' . $e->getMessage()
        ], 500);
    }
}

public function clearCart()
{
    try {
        Cart::where('user_id', auth()->id())->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Cart cleared successfully',
            'count' => 0
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to clear cart: ' . $e->getMessage()
        ], 500);
    }
}
}