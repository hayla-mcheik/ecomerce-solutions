<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class WishlistController extends Controller
{
        public function index()
    {
        $wishlist = Wishlist::with('product')
            ->where('user_id', Auth::id())
            ->get();

        return response()->json($wishlist);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $exists = Wishlist::where('user_id', Auth::id())
                          ->where('product_id', $request->product_id)
                          ->exists();

        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => 'Product already in wishlist'
            ], 409);
        }

        $wishlist = Wishlist::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product added to wishlist',
            'wishlist' => $wishlist
        ]);
    }

    public function destroy($id)
    {
        $wishlist = Wishlist::where('user_id', Auth::id())
                            ->findOrFail($id);

        $wishlist->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product removed from wishlist'
        ]);
    }
    
    public function removeByProduct($productId)
    {
        $wishlist = Wishlist::where('user_id', Auth::id())
                            ->where('product_id', $productId)
                            ->firstOrFail();

        $wishlist->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product removed from wishlist'
        ]);
    }
}
