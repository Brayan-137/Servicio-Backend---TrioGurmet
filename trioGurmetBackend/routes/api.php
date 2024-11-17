<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\RemoveIdAttributes;
use App\Http\Middleware\RemovePasswordAttributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware(RemovePasswordAttributes::class)->group(function () {
    
});
Route::apiResource('clients', ClientController::class);
Route::apiResource('employees', EmployeeController::class);
Route::apiResource('orders', OrderController::class)->middleware(RemoveIdAttributes::class);
Route::apiResource('dishes', DishController::class);



