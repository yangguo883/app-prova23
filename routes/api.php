<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserRegisterController;

Route::prefix('users')->group(function () {
    // Questo endpoint dovrebbe creare la rotta POST: /api/users/register
    Route::post('/register', [UserRegisterController::class, 'register']);
});
