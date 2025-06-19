<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email'    => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return response()->json(['message' => 'Login effettuato'], 200);
    }

    return response()->json(['message' => 'Credenziali non corrette'], 401);
});

Route::post('/register', function (Request $request) {
    $data = $request->validate([
        'name'                  => 'required|string|max:255',
        'email'                 => 'required|string|email|max:255|unique:users',
        'password'              => 'required|string|confirmed|min:6',
    ]);

    $user = User::create([
        'name'     => $data['name'],
        'email'    => $data['email'],
        'password' => bcrypt($data['password']),
    ]);

    Auth::login($user);

    return response()->json(['message' => 'Registrazione completata'], 201);
});
