<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CustomerController;

Route::get('/couriers', [CourierController::class, 'index']); // GET all books
Route::get('/couriers/{id}', [CourierController::class, 'show']); // GET a single book
Route::post('/couriers', [CourierController::class, 'store']); // POST a new book
Route::put('/couriers/{id}', [CourierController::class, 'update']); // PUT to update a book
Route::delete('/couriers/{id}', [CourierController::class, 'destroy']); // DELETE a book

Route::get('/orders', [OrderController::class, 'index']); // GET all books
Route::get('/orders/{id}', [OrderController::class, 'show']); // GET a single book
Route::post('/orders', [OrderController::class, 'store']); // POST a new book
Route::put('/orders/{id}', [OrderController::class, 'update']); // PUT to update a book
Route::delete('/orders/{id}', [OrderController::class, 'destroy']); // DELETE a book

Route::apiResource('couriers', CourierController::class);
Route::apiResource('orders', OrderController::class);
Route::apiResource('vendors', VendorController::class);
Route::apiResource('customers', CustomerController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
