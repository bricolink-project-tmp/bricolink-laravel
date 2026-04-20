<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Show the rich quote request page
    public function create($artisanId)
    {
        $user = Auth::user();
        $artisanUser = \App\Models\User::where('role', 'artisan')->with('artisan')->findOrFail($artisanId);
        
        if (!$artisanUser->artisan || !$artisanUser->artisan->is_available) {
            return redirect()->route('dashboard')->withErrors(['This artisan is currently not available for hire.']);
        }

        return view('client.request-quote', compact('user', 'artisanUser'));
    }

    // Client initiates a new quote request
    public function store(Request $request, $artisanId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'budget_range' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:255',
            'scheduled_date' => 'required|date|after_or_equal:today',
            'references' => 'nullable|array|max:3',
            'references.*' => 'nullable|mimes:jpeg,png,jpg,pdf|max:5120',
        ], [
            'references.max' => 'You cannot upload more than 3 reference images.',
            'references.*.max' => 'Each image must not exceed 5MB.',
        ]);

        $artisan = Artisan::findOrFail($artisanId);

        if (!$artisan->is_available) {
            return back()->withErrors(['This artisan is currently not available for hire.']);
        }

        // Anti-spam check: Does the client already have an active booking with this artisan?
        $existingJob = Booking::where('user_id', Auth::id())
            ->where('artisan_id', $artisanId)
            ->whereNotIn('status', ['canceled', 'completed', 'rejected_by_artisan', 'rejected_by_client', 'archived'])
            ->first();

        if ($existingJob) {
            return back()->withErrors(['You already have an active request or job with this artisan. Please wait until it is completed or declined before sending a new one.']);
        }

        $referencePaths = [];
        if ($request->hasFile('references')) {
            foreach ($request->file('references') as $file) {
                $path = $file->store('bookings/references', 'public');
                $referencePaths[] = $path;
            }
        }

        // Add the new booking
        Booking::create([
            'user_id' => Auth::id(),
            'artisan_id' => $artisanId,
            'title' => $request->title,
            'description' => $request->description,
            'budget_range' => $request->budget_range,
            'location' => $request->location,
            'scheduled_date' => $request->scheduled_date,
            'reference_images' => empty($referencePaths) ? null : $referencePaths,
            'status' => 'pending',
        ]);

        return redirect()->route('dashboard')->with('success', 'Your quote request has been sent to the artisan!');
    }

    // Artisan views detailed booking request
    public function show(Booking $booking)
    {
        // Security check
        if ($booking->artisan_id !== Auth::id()) {
            abort(403);
        }

        return view('artisan.booking-details', compact('booking'));
    }

    // Client views detailed booking request
    public function clientShow(Booking $booking)
    {
        // Security check
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }

        return view('client.booking-details', compact('booking'));
    }

    // Artisan updates the status of the booking
    public function artisanStatusUpdate(Request $request, Booking $booking)
    {
        // Security check
        if ($booking->artisan_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'status' => 'required|in:in_discussion,artisan_approved,artisan_completed,canceled,rejected_by_artisan,archived',
            'price' => 'nullable|required_if:status,artisan_approved|numeric|min:0',
            'final_terms' => 'nullable|required_if:status,artisan_approved|string|max:1500',
        ]);

        if ($request->status === 'artisan_approved') {
            $booking->price = $request->price;
            $booking->final_terms = $request->final_terms;
        }

        $booking->status = $request->status;
        $booking->save();

        if ($request->status === 'rejected_by_artisan') {
            return back()->with('success', 'You have successfully declined this request.');
        }

        if ($request->status === 'archived') {
            return back()->with('success', 'Rejection has been archived.');
        }

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

    // Client declines the artisan's final quote -> canceled
    public function clientDecline(Booking $booking)
    {
        // Security check
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }

        if ($booking->status !== 'artisan_approved') {
            return back()->withErrors(['You cannot decline this job at this stage.']);
        }

        $booking->status = 'rejected_by_client';
        $booking->save();

        return back()->with('success', 'You have declined the artisan\'s terms. The job is canceled.');
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
