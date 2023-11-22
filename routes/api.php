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

Route::group(['prefix' => 'farms'], function () {
    Route::get(
        '/',
        [
            'uses' => FarmController::class,
            'method' => 'index',
            'as' => 'farms.index',
        ]
    );
    Route::get('/{farmId}',
        [
            'uses' => FarmController::class,
            'method' => 'show',
            'as' => 'farms.show',
        ]);
});
