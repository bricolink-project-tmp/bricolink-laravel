<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('settings.index', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        $user->name = $request->name;

        if ($request->hasFile('profile_pic')) {
            if ($user->profile_pic) {
                Storage::disk('public')->delete($user->profile_pic);
            }
            $path = $request->file('profile_pic')->store('profile_pics', 'public');
            $user->profile_pic = $path;
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password does not match.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password updated successfully.');
    }
}
