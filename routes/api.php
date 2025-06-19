<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserRegisterController;

Route::prefix('users')->group(function () {
    // L'endpoint completo sarà: POST http://localhost:8000/api/users/register
    Route::post('/register', [UserRegisterController::class, 'register']);
});
