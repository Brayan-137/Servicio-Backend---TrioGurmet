<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\RemoveIdAttributes;
use App\Http\Middleware\RemovePasswordAttributes;
// use \App\Http\Middleware\CheckUserType;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('dishes', DishController::class);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/clients/{id}', [ClientController::class, 'show']);        

    Route::get('/orders', [OrderController::class, 'show']);
    Route::post('/orders', [OrderController::class, 'store']);

    Route::middleware('scope:employee')->group(function () {
        Route::apiResource('clients', ClientController::class)->except(['show']);
        Route::apiResource('orders', OrderController::class)->except(['show', 'store'])->middleware(RemoveIdAttributes::class);
    });
});


