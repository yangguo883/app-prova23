<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GuestBookMessage;

class GuestBookController extends Controller
{
    // Restituisce tutti i messaggi (con l'utente associato)
    public function index()
    {
        $messages = GuestBookMessage::with('user')->orderBy('created_at', 'desc')->get();
        return response()->json($messages);
    }
    
    // Salva un nuovo messaggio
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $message = GuestBookMessage::create([
            'user_id' => $request->user()->id,
            'message' => $validated['message'],
        ]);

        return response()->json([
            'message' => 'Message posted successfully',
            'data'    => $message,
        ], 201);
    }
}
