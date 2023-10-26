<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rute API
|--------------------------------------------------------------------------
| Di sini adalah tempat Anda dapat mendaftarkan rute API untuk aplikasi Anda. Semua rute ini akan dimuat oleh RouteServiceProvider dan semuanya akan ditugaskan ke grup middleware "api". Buat sesuatu yang hebat!
|
*/

// Rute untuk mengambil informasi pengguna
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Pengelompokan rute terkait otentikasi pengguna
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    // Rute untuk otentikasi pengguna

    // Mendaftarkan pengguna baru
    Route::post('register', [AuthController::class, 'register']);
    
    // Login pengguna
    Route::post('login', [AuthController::class, 'login']);
    
    // Logout pengguna
    Route::post('logout', [AuthController::class, 'logout']);
    
    // Memperbarui token pengguna
    Route::post('refresh', [AuthController::class, 'refresh']);
    
    // Dapatkan informasi pengguna
    Route::post('me', [AuthController::class, 'me']);
});

// Rute sumber daya untuk mengelola produk
Route::apiResource('product', ProductController::class);

// Rute untuk mencari produk berdasarkan kategori
// Route::get('product/search/{cat}', [ProductController::class, 'search']);
