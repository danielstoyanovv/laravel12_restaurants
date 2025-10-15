<?php

use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Public auth endpoints (register/login)
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Protected routes (token required)
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('restaurants', RestaurantController::class);
    Route::post('logout', [AuthController::class, 'logout']);
});
