<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class GuestbookController extends Controller
{
    public function index()
    {
        return Message::with('user')->latest()->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $message = Message::create([
            'message' => $request->message,
            'user_id' => Auth::id(),
        ]);

        return response()->json($message, 201);
    }
}
