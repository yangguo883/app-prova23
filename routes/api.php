<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

Route::prefix('users')->group(function () {
    Route::post('/register', function (Request $request) {
        // Validazione dell'input
        $validatedData = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        // Creazione dell'utente
        $user = User::create([
            'name'     => $validatedData['name'],
            'email'    => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Login immediato dell'utente
        Auth::login($user);

        return response()->json(['message' => 'Registrazione completata'], 201);
    });
});
