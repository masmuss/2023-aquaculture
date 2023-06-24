<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\LoginController;

Route::post('auth/register', RegisterController::class);
Route::post('auth/login', LoginController::class);

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index']);
    Route::apiResource('ponds', \App\Http\Controllers\PondController::class);
    Route::apiResource('pools', \App\Http\Controllers\PoolController::class);
    Route::apiResource('tools', \App\Http\Controllers\ToolController::class);
});
