<?php

use App\Http\Controllers\AuthController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;

Route::prefix('/v1')->group(function () {

    //AUTH
    //Rotas Publicas
    Route::post('/auth/login', [AuthController::class, 'login']);
    Route::post('/users', [UserController::class, 'store']);

    //listagem Publica
    Route::get('/authors', [AuthorController::class, 'index']);
    //Rotas Autenticadas
    Route::middleware('auth:sanctum')->group(function () {

        Route::post('/auth/logout', [AuthController::class, 'logout']);

        Route::put('/users/{user}', [UserController::class, 'update']);
        Route::delete('/users/{user}', [UserController::class, 'destroy']);

        //Rotas Administrador
        Route::middleware(['admin'])->prefix('admin')->group(function () {
            //Rotas Autores
            Route::post('/authors', [AuthorController::class, 'store']);
            Route::put('/authors/{author}', [AuthorController::class, 'update']);
            Route::delete('/authors/{author}', [AuthorController::class, 'destroy']);
        });
    });
});