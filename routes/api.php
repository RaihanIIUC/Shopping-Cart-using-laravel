<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;



Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);


Route::get('/products', [ProductController::class, 'productList'])->name('products.list');
Route::get('products/carts', [CartController::class, 'cartList'])->name('cart.list');
Route::post('products/cart/{product}', [CartController::class, 'addToCart'])->name('cart.store');
Route::put('update-cart/{product}', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

