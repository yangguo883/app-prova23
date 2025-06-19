<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserRegisterController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GuestBookController;

// Registrazione utente: POST /api/register
Route::post('register', [UserRegisterController::class, 'register']);

// Login: POST /api/login
Route::post('login', [AuthController::class, 'login']);

// Endpoint protetti tramite Sanctum:
Route::middleware('auth:sanctum')->group(function () {
    // Logout: POST /api/logout
    Route::post('logout', [AuthController::class, 'logout']);
    
    // Ottieni tutti i messaggi del guestbook: GET /api/messages
    Route::get('messages', [GuestBookController::class, 'index']);
    
    // Pubblica un nuovo messaggio: POST /api/messages
    Route::post('messages', [GuestBookController::class, 'store']);
});

// Un eventuale fallback (opzionale)
Route::fallback(function () {
    return response()->json(['message' => 'Route not found'], 404);
});
