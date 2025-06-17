<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestbookController;
use App\Http\Controllers\AuthController;

// Redirect homepage
Route::redirect('/', '/guestbook');

// Rotte autenticazione
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Guestbook protetto da login
Route::middleware('auth')->group(function () {
    Route::get('/guestbook', [GuestbookController::class, 'index'])->name('guestbook.index');
    Route::post('/guestbook/add', [GuestbookController::class, 'addMessage'])->name('add-message');
});

