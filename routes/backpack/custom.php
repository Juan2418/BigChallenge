<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('category', 'CategoryCrudController');
    Route::crud('ingredient', 'IngredientCrudController');
    Route::crud('order', 'OrderCrudController');
    Route::crud('product', 'ProductCrudController');
    Route::get('charts/monthly-orders', 'Charts\MonthlyOrdersChartController@response')->name('charts.monthly-orders.index');
    Route::get('charts/weekly-income', 'Charts\WeeklyIncomeChartController@response')->name('charts.weekly-income.index');
    Route::get('charts/weekly-popular-product', 'Charts\WeeklyPopularProductChartController@response')->name('charts.weekly-popular-product.index');
}); // this should be the absolute last line of this file