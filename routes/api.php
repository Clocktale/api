<?php

use App\Http\Controllers\AuthController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\AuthorController;

Route::prefix('/v1')->group(function () {

    //AUTH
    //Rotas Publicas
    Route::post('/auth/login', [AuthController::class, 'login']);
    //Users_create
    Route::post('/users', [UserController::class, 'store']);

    //Rotas Autenticadas
    Route::middleware('auth:sanctum')->group(function () {
    //listagem Publica
    Route::get('/authors', [AuthorController::class, 'index']);
    //Rotas Autenticadas
    Route::middleware('auth:sanctum')->group(function () {

        Route::post('/auth/logout', [AuthController::class, 'logout']);
        Route::put('/users/{user}', [UserController::class, 'update']);
        Route::delete('/users/{user}', [UserController::class, 'destroy']);

        //Rotas administrativas
        Route::middleware(['admin'])->prefix('admin')->group(function () {
            Route::post('/studios', [StudioController::class, 'store']);
            Route::put('/studios/{studio}', [StudioController::class, 'update']);
            Route::delete('/studios/{studio}', [StudioController::class, 'destroy']);
            Route::post('/authors', [AuthorController::class, 'store']);
            Route::put('/authors/{author}', [AuthorController::class, 'update']);
            Route::delete('/authors/{author}', [AuthorController::class, 'destroy']);
    });
});