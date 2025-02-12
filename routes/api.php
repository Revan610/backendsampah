<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\ApiCategoriesController;
use App\Http\Controllers\Api\ApiWastesController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::put('/update/{id}', [AuthController::class, 'update']);
});

Route::apiResource('category',ApiCategoriesController::class);
Route::apiResource('wastes',ApiWastesController::class);