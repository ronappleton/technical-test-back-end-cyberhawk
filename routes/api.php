<?php

use App\Http\Controllers\ComponentController;
use App\Http\Controllers\ComponentTypeController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GradeTypeController;
use App\Http\Controllers\InspectionController;
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
        Route::get('/turbines/{turbineId}/components', 'components');
        Route::get('/turbines/{turbineId}/components/{componentId}', 'component');
    });

Route::controller(ComponentController::class)
    ->group(function () {
        Route::get('/components', 'index');
        Route::get('/components/{componentId}', 'show');
        Route::get('/components/{componentId}/grades', 'grades');
        Route::get('/components/{componentId}/grades/{gradeId}', 'grade');
    });

Route::controller(InspectionController::class)
    ->group(function () {
        Route::get('/inspections', 'index');
        Route::get('/inspections/{inspectionId}', 'show');
        Route::get('/inspections/{inspectionId}/grades', 'grades');
        Route::get('/inspections/{inspectionId}/grades/{gradeId}', 'grade');
    });

Route::controller(GradeController::class)
    ->group(function () {
        Route::get('/grades', 'index');
        Route::get('/grades/{gradeId}', 'show');
    });

Route::controller(ComponentTypeController::class)
    ->group(function () {
        Route::get('/component-types', 'index');
        Route::get('/component-types/{componentType}', 'show');
    });

Route::controller(GradeTypeController::class)
    ->group(function () {
        Route::get('/grade-types', 'index');
        Route::get('/grade-types/{gradeType}', 'show');
    });


Route::post('/token', 'TokenController')->withoutMiddleware(['auth:sanctum']);
