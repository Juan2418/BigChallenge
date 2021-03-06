<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Category;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categories', function () {
    return Category::with('products.ingredients')->latest()->get();
});

Route::post('/order', 'App\Http\Controllers\OrderController@store');


Route::group(['prefix' => 'product-popularity', 'as' => 'product-popularity'], function () {
    Route::get('/chart', 'App\Http\Controllers\PopularityController@chartData');
    Route::get('/names', 'App\Http\Controllers\PopularityController@names');
    Route::get('/totals', 'App\Http\Controllers\PopularityController@totalOrderCount');
    Route::get('/', 'App\Http\Controllers\PopularityController@index');
});

