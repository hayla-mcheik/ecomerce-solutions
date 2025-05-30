<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class FrontendController extends Controller
{
      public function home() 
    {
       $categories = Category::all();
       $featuredproducts = Product::where('is_featured',1)->get();
       $topsellingproducts = Product::where('top_selling',1)->get();
        $sliders = Slider::all();
       return Inertia::render('Frontend/Home' , [
        'featuredproducts' => $featuredproducts,
        'topsellingproducts' => $topsellingproducts,
        'categories' => $categories,
        'sliders' => $sliders
       ]);
    }

    public function services()
    {
        return Inertia::render('Frontend/Services');
    }

    public function projects()
    {
        return Inertia::render('Frontend/Projects');
    }



public function products()
{
    $categories = Category::all();
    $products = Product::all();
    return Inertia::render('Frontend/Products', [
        'categories' => $categories,
        'products' => $products
    ]);
}



public function productDetails($id)
{
    $product = Product::findOrFail($id);
    return Inertia::render('Frontend/ProductDetails',[
        'product' => $product
    ]);
}

public function cart()
{
    $cart = Cart::with('product') // Eager load the product relationship
        ->where('user_id', Auth::id())
        ->get()
        ->map(function ($item) {
            return [
                'id' => $item->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'total' => $item->price * $item->quantity,
                'product' => [ // Include the product data
                    'id' => $item->product->id,
                    'name' => $item->product->name,
                    'image' => $item->product->image,
                    'stock' => $item->product->quantity
                ]
            ];
        });

    return Inertia::render('Frontend/Cart', [
        'cart' => $cart
    ]);
}

public function checkout()
{
     $cart = Cart::with('product') // Eager load the product relationship
        ->where('user_id', Auth::id())
        ->get();
    return Inertia::render('Frontend/Checkout',[
        'cart' =>$cart
    ]);
}

public function faq()
{
    return Inertia::render('Frontend/Faq');
}

public function wishlist()
{
       return Inertia::render('Frontend/Wishlist'); 
}

    public function about()
    {
        return Inertia::render('Frontend/About');
    }

    public function contact()
    {
        return Inertia::render('Frontend/Contact');
    }



}
