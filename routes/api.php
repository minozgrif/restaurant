<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Ruta pública para iniciar sesión y obtener un token
Route::post('/login', [AuthController::class, 'login']);

// Grupo de rutas protegidas con Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [AuthController::class, 'logout']);
});

//Grupo de rutas protegidas con Sanctum y Rol de Admin
Route::middleware(['auth:sanctum', 'role:admin'])->get('/admin/dashboard', function () {
    return response()->json(['message' => 'Bienvenido, Admin']);
});

Route::middleware(['auth:sanctum', 'role:admin'])->post('/asignar-rol', [UserController::class, 'asignarRol']);
Route::middleware(['auth:sanctum', 'role:admin'])->get('/logs', function () {
    return response()->json(\App\Models\ActivityLog::with('user')->latest()->get());
});