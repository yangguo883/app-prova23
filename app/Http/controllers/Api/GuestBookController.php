<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validazione degli input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        // Cerca l'utente per email
        $user = User::where('email', $request->input('email'))->first();

        // Verifica che l'utente esista e che la password sia corretta
        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            return response()->json(['error' => 'Credenziali non valide'], 401);
        }

        // Crea il token tramite Sanctum
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'Bearer'
        ]);
    }
}
