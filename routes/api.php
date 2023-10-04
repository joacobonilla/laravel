<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use App\Http\Controllers\TareaController;
use Illuminate\Support\Facades\Route;

Route::get('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'login']);
Route::resource('tareas', TareaController::class);

