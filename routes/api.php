<?php

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

Route::group(['prefix' => 'farms'], function () {
    Route::get('/', 'FarmController@index');
    Route::get('/{farmId}', 'FarmController@show');
});

Route::group(['prefix' => 'turbines'], function () {
    Route::get('/', 'TurbineController@index');
    Route::get('/{turbineId}', 'TurbineController@show');
});
