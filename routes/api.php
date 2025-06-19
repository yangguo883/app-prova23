<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestbookController;

Route::get('/sanctum/csrf-cookie', function (Request $request) {
    return response()->noContent();
});


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/posts', [GuestbookController::class, 'index']);
    Route::post('/posts', [GuestbookController::class, 'store']);
});
