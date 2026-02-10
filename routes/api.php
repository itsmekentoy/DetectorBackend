<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorDataController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(SensorDataController::class)->group(function () {
    Route::get('/connect', 'connection');
    Route::post('/create', 'store');
    Route::get('/getdata', 'getData');
});