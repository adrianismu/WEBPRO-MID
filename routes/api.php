<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {

    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});

// Route::get('product', [ProductController::class, 'index']);
// Route::get('product/{id}', [ProductController::class, 'show']);
// Route::post('product', [ProductController::class, 'store']);
// Route::put('product/{id}', [ProductController::class, 'update']);
// Route::delete('product/{id}', [ProductController::class, 'destroy']);

Route::apiResource('product', ProductController::class);

// Route::get('product/search/{cat}', [ProductController::class, 'search']);    