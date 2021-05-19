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

Route::get('/categories', function() {
    return Category::with('products.ingredients')->latest()->get();
});

Route::post('/order', 'App\Http\Controllers\OrderController@store');


Route::get('/product-popularity/chart', 'App\Http\Controllers\PopularityController@chartData');
Route::get('/product-popularity/names', 'App\Http\Controllers\PopularityController@names');
Route::get('/product-popularity/totals', 'App\Http\Controllers\PopularityController@totalOrderCount');
Route::get('/product-popularity/', 'App\Http\Controllers\PopularityController@index');
