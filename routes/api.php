<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StreamingController;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {

    Route::post('/auth/login', [AuthController::class, 'login']);
    // Users_creates
    Route::post('/users', [UserController::class, 'store']);

    //authors
    Route::get('/authors', [AuthorController::class, 'index']);
    // Streamings
    Route::get('/streamings', [StreamingController::class, 'index']); 

    Route::middleware('auth:sanctum')->group(function () {


        // Rotas Autenticadas
        Route::middleware('auth:sanctum')->group(function () {

            Route::post('/auth/logout', [AuthController::class, 'logout']);
            Route::put('/users/{user}', [UserController::class, 'update']);
            Route::delete('/users/{user}', [UserController::class, 'destroy']);

            Route::middleware(['admin'])->prefix('admin')->group(function () {
                Route::post('/authors', [AuthorController::class, 'store']);
                Route::put('/authors/{author}', [AuthorController::class, 'update']);
                Route::delete('/authors/{author}', [AuthorController::class, 'destroy']);

                Route::post('/streamings', [StreamingController::class, 'store']);
                Route::put('/streamings/{streaming}', [StreamingController::class, 'update']);
                Route::delete('/streamings/{streaming}', [StreamingController::class, 'destroy']);
            });
        });
    });
});
