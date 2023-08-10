<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\{RegisterController, LoginController};
use App\Http\Controllers\Api\{
    UserController,
    PondController,
    PoolController,
    ToolController,
    ProvinceController,
    RegencyController
};

Route::post('auth/register', RegisterController::class);
Route::post('auth/login', LoginController::class);

Route::get('/ping', fn () => response()->json(['message' => 'pong']))->name('ping');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', fn (\Illuminate\Http\Request $request) => $request->user());
    Route::apiResource('users', UserController::class);
    Route::apiResources([
        'ponds' => PondController::class,
        'pools' => PoolController::class,
        'tools' => ToolController::class,
        'provinces' => ProvinceController::class,
        'regencies' => RegencyController::class,
    ]);
});
