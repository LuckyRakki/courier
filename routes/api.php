<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CustomerController;

Route::apiResource('couriers', CourierController::class);
Route::apiResource('orders', OrderController::class);
Route::apiResource('vendors', VendorController::class);
Route::apiResource('customers', CustomerController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
