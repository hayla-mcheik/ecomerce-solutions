<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::post('/send-contact-form',[ContactController::class, 'send'])->name('contact.send');

Route::controller(FrontendController::class)->group(function() {
Route::get('/','home')->name('home.index');
Route::get('/about','about')->name('about.index');
Route::get('/contact','contact')->name('contact.index');
Route::get('/services','services')->name('services.index');
Route::get('/projects','projects')->name('projects.index');
Route::get('/products','products')->name('products.index');
Route::get('/product-details/{id}','productDetails')->name('productDetails.index');
Route::get('/cart','cart')->name('cart.index');
Route::get('/checkout','checkout')->name('checkout.index');
Route::get('/faq','faq')->name('faq.index');
Route::get('/wishlist','wishlist')->name('wishlist.index');
});


Route::middleware(['auth','verified'])->prefix('admin')
->controller(AdminController::class)
->group(function () {
    Route::get('/dashboard','index')->name('dashboard');
        Route::resource('products',ProductController::class);
    Route::resource('categories',CategoriesController::class);
    Route::resource('sliders',SliderController::class);
});


Route::middleware('auth')->group(function () {
    Route::post('/cart/add', [CartController::class, 'addToCart']);
    Route::get('/cart/count', [CartController::class, 'getCartCount']);
    Route::get('/cart/items', [CartController::class, 'getCartItems']);
       Route::put('/cart/{cartId}/update-quantity', [CartController::class, 'updateQuantity']);
    Route::delete('/cart/{cartId}/remove', [CartController::class, 'removeFromCart']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
