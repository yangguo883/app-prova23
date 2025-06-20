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

        // Ricerca dell'utente tramite email
        $user = User::where('email', $request->input('email'))->first();

        // Se l'utente non esiste o la password non corrisponde, restituisci errore 401
        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            return response()->json(['error' => 'Credenziali non valide'], 401);
        }

        // Genera il token tramite Sanctum
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'Bearer'
        ]);
    }
}
