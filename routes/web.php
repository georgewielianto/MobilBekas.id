<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\RegisterController;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\CartController;

use App\Http\Controllers\SparePartController;

use App\Http\Controllers\Cart_spareController;

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\AdminController;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('home', [ProductController::class, 'products'])->name('products');
});



Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::post('/upload', [HomeController::class, 'upload'])->name('upload');

Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');




Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');


Route::get('/admin', function () {
    return view('admin');
})->name('admin');



Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');


Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('show');

Route::post('/cart/add/{product}', [ProductController::class, 'addToCart'])->name('addToCart');

Route::post('/cart/add-sparepart/{sparepart}', [SparePartController::class, 'addToCart'])->name('addToCartSparepart');









Route::middleware(['auth'])->group(function () {
    Route::get('/carts', [CartController::class, 'index'])->name('carts.index');
    Route::patch('/carts/{cartItem}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/carts/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');

    // Routes for spare parts
    Route::get('/spareparts/carts', [Cart_SpareController::class, 'index'])->name('spareparts.carts.index');
    Route::patch('/spareparts/carts/{cartSparepart}', [Cart_SpareController::class, 'update'])->name('spareparts.cart.update');
    Route::delete('/spareparts/carts/{cartSparepart}', [Cart_SpareController::class, 'remove'])->name('spareparts.cart.remove');
    Route::get('/spareparts/checkout', [Cart_SpareController::class, 'checkout'])->name('spareparts.checkout');
});





Route::post('/carts/check', [CartController::class, 'check'])->name('carts.check');

Route::post('/carts/check_spare', [Cart_spareController::class, 'check_spare'])->name('carts.check_spare');




Route::patch('/cart/{cartItem}', 'App\Http\Controllers\CartController@update')->name('cart.update');



Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');

Route::delete('/spareparts/{id}', [SparePartController::class, 'destroy'])->name('spareparts.destroy');

Route::post('/spareparts', [SparePartController::class, 'store'])->name('spareparts.store');
Route::get('/spareparts/{sparepart}/edit', [SparePartController::class, 'edit'])->name('edit_spare');
Route::put('/spareparts/{sparepart}', [SparePartController::class, 'update'])->name('spareparts.update');







Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');




//search
Route::get('/search', [ProductController::class, 'search'])->name('search');

Route::get('/search', [SparePartController::class, 'search'])->name('search');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::delete('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');



Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::delete('/admin/checkout/{id}', [AdminController::class, 'destroy'])->name('checkout.destroy');




