<?php

use App\Http\Controllers\FarmController;
use App\Http\Controllers\GradeTypeController;
use App\Http\Controllers\TurbineController;
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
        Route::get('/farms/{farmId}', 'show');
        Route::get('/farms/{farmId}/turbines', 'turbines');
        Route::get('/farms/{farmId}/turbines/{turbineId}', 'turbine');
    });

Route::controller(TurbineController::class)
    ->group(function () {
        Route::get('/turbines', 'index');
        Route::get('/turbines/{turbineId}', 'show');
        Route::get('/turbines/{turbineId}/inspections', 'inspections');
        Route::get('/turbines/{turbineId}/inspections/{inspectionId}', 'inspection');
    });

Route::group(['prefix' => 'inspections'], function () {
    Route::get('/', 'InspectionController@index');
    Route::get('/{inspectionId}', 'InspectionController@show');
});

Route::controller(GradeTypeController::class)
    ->group(function () {
        Route::get('/grade-types', 'index');
        Route::get('/grade-types/{gradeTypeId}', 'show');
    });


