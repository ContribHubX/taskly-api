<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/health', function () {
  return "Healthy";
});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected Authentication Routes (Require Authentication)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'getMyDetails']);

    // Password Reset Routes
    Route::prefix('password')->group(function () {
        Route::post('/forgot', [AuthController::class, 'sendResetLink']);
        Route::post('/reset', [AuthController::class, 'resetPassword'])->name('password.update');
    });
});



Route::resource('/tasks', TaskController::class)->middleware('auth:sanctum');
