<?php

use App\Http\Controllers\ComponentController;
use App\Http\Controllers\ComponentTypeController;
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

Route::controller(ComponentTypeController::class)
    ->group(function () {
        Route::get('/component-types', 'index');
        Route::get('/component-types/{componentTypeId}', 'show');
    });

Route::controller(ComponentController::class)
    ->group(function () {
        Route::get('/components', 'index');
        Route::get('/components/{componentId}', 'show');
    });

Route::controller(ComponentController::class)
    ->group(function () {
        Route::get('/components', 'index');
        Route::get('/components/{componentId}', 'show');
    });

