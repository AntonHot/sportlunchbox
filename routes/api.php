<?php

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

// Route::resource('dishes', 'Api\DishController');

// Route::resource('rations', 'Api\RationController');

// Route::get('menu/{from?}/{to?}', 'Api\MenuController@days');

Route::post('rations', 'Api\RationController@list');