<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Rute Web
|--------------------------------------------------------------------------
| Di sini adalah tempat Anda dapat mendaftarkan rute web untuk aplikasi Anda. Semua rute ini akan dimuat oleh RouteServiceProvider dan semuanya akan ditugaskan ke grup middleware "web". Buat sesuatu yang hebat!
|
*/

// Rute untuk halaman utama aplikasi
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk menampilkan daftar produk
Route::get('/product', [ProductController::class, 'index'])->name('product.index');

// Rute untuk menampilkan formulir penambahan produk
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');

// Rute untuk menyimpan produk baru
Route::post('/product', [ProductController::class, 'store'])->name('product.store');

// Rute untuk menampilkan formulir pengeditan produk
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');

// Rute untuk memperbarui produk yang ada
Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');

// Rute untuk menghapus produk
Route::delete('/product/{product}/delete', [ProductController::class, 'destroy'])->name('product.delete');

// Rute otentikasi yang disediakan oleh Laravel
Auth::routes();

// Rute untuk halaman beranda
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rute untuk menampilkan daftar produk pada toko
Route::get('/store', [ProductController::class, 'productList'])->name('product.list');

// Rute untuk menampilkan daftar produk dalam keranjang belanja
Route::get('/cart', [CartController::class, 'cartList'])->name('cart.list');

// Rute untuk menambahkan produk ke keranjang belanja
Route::post('/cart', [CartController::class, 'addToCart'])->name('cart.store');

// Rute untuk memperbarui keranjang belanja
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');

// Rute untuk menghapus produk dari keranjang belanja
Route::post('/remove', [CartController::class, 'removeCart'])->name('cart.remove');

// Rute untuk menghapus semua produk dari keranjang belanja
Route::post('/clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
