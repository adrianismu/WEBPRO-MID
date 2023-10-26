<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', [ProductController::class, 'index'])->name('product.index');

Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');

Route::post('/product', [ProductController::class, 'store'])->name('product.store');

Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');

Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');

Route::delete('/product/{product}/delete', [ProductController::class, 'destroy'])->name('product.delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/store', [ProductController::class, 'productList'])->name('product.list');
Route::get('/cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('/cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
