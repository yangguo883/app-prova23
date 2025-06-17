<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class GuestbookController extends Controller
{
    public function index()
    {
        $messages = Message::with('user')->latest()->get();
        return view('guestbook', compact('messages'));
    }

    public function addMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:25',
        ]);

        $userId = Auth::id(); 

        Message::create([
            'message' => $request->input('message'),
            'user_id' => $userId,
        ]);

        return redirect()->route('guestbook.index')->with('success', 'Messaggio inviato!');
    }
}
