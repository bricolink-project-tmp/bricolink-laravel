<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        if ($user->role === 'artisan') {
            // Ensure the artisan profile exists (safety for old users)
            if (!$user->artisan) {
                $user->artisan()->create([
                    'craft_type' => 'Not Specified',
                    'bio' => null,
                    'is_available' => false,
                    'profile_views' => 0,
                ]);
                $user->load('artisan');
            }

            $user->load(['artisan.portfolioImages', 'artisan.bookings.user']);
            return view('artisan.dashboard', compact('user'));
        }

        // If client, fetch categories and featured artisans for the discovery feed
        $categories = Category::all();
        
        $query = User::where('role', 'artisan')
            ->with(['artisan', 'artisan.portfolioImages']);
            
        if ($request->has('category')) {
            $query->whereHas('artisan', function($q) use ($request) {
                $q->where('craft_type', $request->category);
            });
        }
            
        $artisans = $query->get()
            ->sortByDesc(function ($userParam) {
                return $userParam->artisan->is_available ?? false;
            });
            
        $clientBookings = \App\Models\Booking::where('user_id', \Illuminate\Support\Facades\Auth::id())
            ->with('artisan.user')
            ->latest()
            ->get();
        
        return view('client.dashboard', compact('user', 'categories', 'artisans', 'clientBookings'));
    }

    public function viewArtisanProfile($id)
    {
        $user = Auth::user();
        $artisanUser = User::where('role', 'artisan')->with(['artisan', 'artisan.portfolioImages'])->findOrFail($id);
        
        if ($artisanUser->artisan) {
            $artisanUser->artisan->increment('profile_views');
        }

        return view('client.profile', compact('user', 'artisanUser'));
    }
}
