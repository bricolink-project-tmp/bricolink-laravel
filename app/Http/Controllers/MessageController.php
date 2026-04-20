<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(Booking $booking)
    {
        // Ensure user is part of the booking
        if ($booking->user_id !== Auth::id() && $booking->artisan_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $messages = $booking->messages()->with('sender')->orderBy('created_at', 'asc')->get();
        return response()->json($messages);
    }

    public function store(Request $request, Booking $booking)
    {
        // Ensure user is part of the booking
        if ($booking->user_id !== Auth::id() && $booking->artisan_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        $message = Message::create([
            'booking_id' => $booking->id,
            'sender_id' => Auth::id(),
            'message' => $request->message
        ]);

        $message->load('sender');
        return response()->json($message);
    }
}
