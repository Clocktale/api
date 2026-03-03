<?php

use App\Http\Controllers\AuthController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::prefix('/v1')->group(function () {

    //AUTH
    //Rotas Publicas
    Route::post('/auth/login', [AuthController::class, 'login']);
    Route::post('/users', [UserController::class, 'store']);

    //Rotas Autenticadas
    Route::middleware('auth:sanctum')->group(function () {
        
        Route::post('/auth/logout', [AuthController::class, 'logout']);

        Route::put('/users/{user}', [UserController::class, 'update']);
        Route::delete('/users/{user}', [UserController::class, 'destroy']);
    });

    //Rotas Administrador
    // Route::middleware(['auth:sanctum', 'role:admin'])->prefix('admin')->group(function () {

    // });

});