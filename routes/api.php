<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);




Route::post('/products', [ProductController::class, 'getIndex']);

Route::get('/products/carts', [ProductController::class, 'getCart']);



Route::middleware('auth:api')->group(function () {
    Route::post('/addcart/{id}', [ProductController::class, 'getAddToCart']);

});
