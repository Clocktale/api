<?php

use App\Http\Controllers\AuthController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;

Route::prefix('/v1')->group(function () {

    Route::post('/auth/login', [AuthController::class, 'login']);
    Route::post('/users', [UserController::class, 'store']);
    

    Route::get('/authors', [AuthorController::class, 'index']);

    Route::middleware('auth:sanctum')->group(function () {

        Route::post('/auth/logout', [AuthController::class, 'logout']);

        Route::put('/users/{user}', [UserController::class, 'update']);
        Route::delete('/users/{user}', [UserController::class, 'destroy']);

        Route::middleware(['admin'])->prefix('admin')->group(function () {
            Route::post('/authors', [AuthorController::class, 'store']);
            Route::put('/authors/{author}', [AuthorController::class, 'update']);
            Route::delete('/authors/{author}', [AuthorController::class, 'destroy']);
        });
    });
});