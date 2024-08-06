<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CobrosController;
use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cobros', [CobrosController::class, 'index']);

Route::get('/cobros/{id}', [CobrosController::class, 'show']);

Route::get('/usuarios', [UsersController::class, 'index']);

Route::get('/usuarios/registro', [UsersController::class, 'createUser']);

