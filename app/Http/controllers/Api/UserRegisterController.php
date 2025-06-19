<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserRegisterController extends Controller
{
    public function register(Request $request)
    {
        // Valida i dati in ingresso (assicurati di inviare "password_confirmation" uguale a "password")
        $validatedData = $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|string|email|max:255|unique:users',
            'password'              => 'required|string|confirmed|min:6',
        ]);

        try {
            // Crea l'utente
            $user = User::create([
                'name'     => $validatedData['name'],
                'email'    => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
            ]);

            // Effettua il login immediato
            Auth::login($user);

            // Crea il token API (assicurati di avere Laravel Sanctum installato e migrato)
            $token = $user->createToken('api-token')->plainTextToken;

            return response()->json([
                'message' => 'Registration successful',
                'user'    => $user,
                'token'   => $token,
            ], 201);
        } catch (\Exception $e) {
            \Log::error('Registration Error: ' . $e->getMessage());
            return response()->json([
                'message' => 'Internal Server Error',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
