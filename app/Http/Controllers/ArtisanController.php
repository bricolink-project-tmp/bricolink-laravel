<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artisan;
use App\Models\PortfolioImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ArtisanController extends Controller
{
    public function updateBio(Request $request)
    {
        $request->validate([
            'bio' => 'required|string|max:1000',
        ]);

        $artisan = Artisan::where('artisan_id', Auth::id())->firstOrFail();
        $artisan->update(['bio' => $request->bio]);

        return redirect()->back()->with('success', 'Bio updated successfully!');
    }

    public function uploadPortfolioImage(Request $request)
    {
        $request->validate([
            'portfolio_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120', // Max 5MB
        ]);

        $artisan = Artisan::where('artisan_id', Auth::id())->firstOrFail();

        if ($request->hasFile('portfolio_image')) {
            $path = $request->file('portfolio_image')->store('portfolios', 'public');
            
            PortfolioImage::create([
                'artisan_id' => $artisan->artisan_id,
                'image_path' => $path,
            ]);

            return redirect()->back()->with('success', 'Image added to portfolio!');
        }

        return redirect()->back()->with('error', 'Failed to upload image.');
    }

    public function deletePortfolioImage(Request $request, $id)
    {
        $image = PortfolioImage::where('id', $id)->where('artisan_id', Auth::id())->firstOrFail();
        
        // Delete from local storage
        if (Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }

        $image->delete();

        return redirect()->back()->with('success', 'Image removed from portfolio.');
    }
}
