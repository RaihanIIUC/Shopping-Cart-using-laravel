<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::group(['prefix' => 'auth'], function () {

    Route::post('login', 'App\Http\Controllers\AuthController@login')->name('login');
    Route::post('signup', 'App\Http\Controllers\AuthController@signup')->name('signup');

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', 'App\Http\Controllers\AuthController@logout');
    });
});

Route::apiResource('products', 'App\Http\Controllers\ProductController')->except(['update', 'store', 'destroy']);
Route::apiResource('carts', 'App\Http\Controllers\CartController')->except(['update', 'index']);
Route::apiResource('orders', 'App\Http\Controllers\OrderController')->except(['update', 'destroy', 'store'])->middleware('auth:api');
Route::post('/carts/{cart}', 'App\Http\Controllers\CartController@addProducts');
Route::post('/carts/{cart}/checkout', 'App\Http\Controllers\CartController@checkout');
