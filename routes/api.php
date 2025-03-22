<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/health', function (Request $request) {
  return response()->json(["message" => "Healthy"]);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::resource('/tasks', TaskController::class)->middleware('auth:sanctum');
