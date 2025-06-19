<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return response()->noContent();
    }
    
    return response()->json(['message' => 'Le credenziali non sono corrette'], 401);
});

Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|confirmed|min:6',
    ]);

    $user = \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    Auth::login($user);
    return response()->noContent();
});

// Utilizza il controller di Sanctum per impostare il CSRF cookie
Route::get('/sanctum/csrf-cookie', [CsrfCookieController::class, 'show']);

// Eventuale route di test CORS (opzionale)
Route::middleware(['web'])->get('/test-cors', function () {
    return response('OK')
        ->header('Access-Control-Allow-Origin', 'http://localhost:5174')
        ->header('Access-Control-Allow-Credentials', 'true');
});
