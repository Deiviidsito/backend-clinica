<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']); // Ruta para registrar un nuevo usuario
Route::post('login', [AuthController::class, 'login']); // Ruta para iniciar sesión

Route::middleware('auth:api')->get('user', [AuthController::class, 'getUser']);  // Ruta para obtener el usuario autenticado
