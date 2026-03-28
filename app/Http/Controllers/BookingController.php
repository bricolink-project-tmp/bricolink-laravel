<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Client initiates a new quote request
    public function store(Request $request, $artisanId)
    {
        $request->validate([
            'description' => 'required|string|max:1000',
            'scheduled_date' => 'required|date|after_or_equal:today',
        ]);

        $artisan = Artisan::findOrFail($artisanId);

        if (!$artisan->is_available) {
            return back()->withErrors(['This artisan is currently not available for hire.']);
        }

        // Add the new booking
        Booking::create([
            'user_id' => Auth::id(),
            'artisan_id' => $artisanId,
            'description' => $request->description,
            'scheduled_date' => $request->scheduled_date,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Your quote request has been sent to the artisan!');
    }

    // Artisan updates the status of the booking
    public function artisanStatusUpdate(Request $request, Booking $booking)
    {
        // Security check
        if ($booking->artisan_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'status' => 'required|in:in_discussion,artisan_approved,artisan_completed',
        ]);

        $booking->status = $request->status;
        $booking->save();

        return back()->with('success', 'Job pipeline updated successfully.');
    }

    // Client accepts the artisan's final quote -> booked
    public function clientApprove(Booking $booking)
    {
        // Security check
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }

        if ($booking->status !== 'artisan_approved') {
            return back()->withErrors(['The artisan has not sent a final quote to approve yet.']);
        }

        $booking->status = 'booked';
        $booking->save();

        return back()->with('success', 'You have successfully hired the artisan for this job!');
    }

    // Client verifies work is done and leaves rating
    public function clientVerify(Request $request, Booking $booking)
    {
        // Security check
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }

        if ($booking->status !== 'artisan_completed') {
            return back()->withErrors(['The artisan has not marked this job as completed yet.']);
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:1000',
        ]);

        $booking->status = 'completed';
        $booking->rating = $request->rating;
        $booking->review = $request->review;
        $booking->save();

        return back()->with('success', 'Thank you for verifying this job and leaving a review!');
    }
}
