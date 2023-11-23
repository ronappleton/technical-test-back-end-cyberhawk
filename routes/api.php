<?php

use App\Http\Controllers\FarmController;
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

Route::controller(FarmController::class)
    ->group(function () {
        Route::get('/farms', 'index');
        Route::get('/farms/{farmId}/turbines', 'turbines');
        Route::get('/farms/{farmId}', 'show');
        Route::get('/farms/{farmId}/turbines/{turbineId}', 'turbine');
    });

Route::group(['prefix' => 'turbines'], function () {
    Route::get('/', 'TurbineController@index');
    Route::get('/{turbineId}', 'TurbineController@show');
});
