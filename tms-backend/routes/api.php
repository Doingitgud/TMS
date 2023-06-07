<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\vehicleDriverController;
use App\Http\Controllers\vehicleController;
use App\Http\Controllers\taskController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;

Route::get('/vehicleDriver',[vehicleDriverController::class, 'index']);
Route::post('/vehicleDriver/save',[vehicleDriverController::class, 'store']);
Route::put('/vehicleDriver/update/{id}',[vehicleDriverController::class, 'update']);
Route::delete('/vehicleDriver/delete/{id}',[vehicleDriverController::class, 'destroy']);

//-------------------------------------------------------------------------------------------------

Route::get('/vehicle',[vehicleController::class, 'index']);
Route::post('/vehicle/save',[vehicleController::class, 'store']);
Route::put('/vehicle/update/{id}',[vehicleController::class, 'update']);
Route::delete('/vehicle/delete/{id}',[vehicleController::class, 'destroy']);

//-------------------------------------------------------------------------------------------------

Route::get('/task',[taskController::class, 'index']);
Route::post('/task/save',[taskController::class, 'store']);
Route::put('/task/update/{id}',[taskController::class, 'update']);
Route::delete('/task/delete/{id}',[taskController::class, 'destroy']);

//--------------------------------------------------------------------------------------------------

Route::get('/admin',[adminController::class, 'index']);
Route::post('/admin/save',[adminController::class, 'store']);
Route::put('/admin/update/{id}',[adminController::class, 'update']);
Route::delete('/admin/delete/{id}',[adminController::class, 'destroy']);

//--------------------------------------------------------------------------------------------------
Route::get('/employee',[employeeController::class, 'index']);
Route::put('/employee/update/{id}',[employeeController::class, 'update']);

//--------------------------------------------------------------------------------------------------
Route::get('/home',[homeController::class, 'index']);
Route::get('/login',[loginController::class, 'index']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
