<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArtisanController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::middleware('auth')->group(function () {
    // General Settings
    Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings/profile', [App\Http\Controllers\SettingsController::class, 'updateProfile'])->name('settings.profile');
    Route::post('/settings/password', [App\Http\Controllers\SettingsController::class, 'updatePassword'])->name('settings.password');

    // Artisan Profile & Settings
    Route::get('/artisan/settings', [ArtisanController::class, 'settings'])->name('artisan.settings');
    Route::post('/artisan/availability', [ArtisanController::class, 'toggleAvailability'])->name('artisan.availability.toggle');
    Route::post('/artisan/profile', [ArtisanController::class, 'updateProfile'])->name('artisan.profile.update');
    Route::post('/artisan/portfolio', [ArtisanController::class, 'uploadPortfolioImage'])->name('artisan.portfolio.upload');
    Route::delete('/artisan/portfolio/{id}', [ArtisanController::class, 'deletePortfolioImage'])->name('artisan.portfolio.delete');

    // Dual-Approval Booking System
    Route::get('/client/artisan/{id}/request-quote', [App\Http\Controllers\BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking/{artisanId}', [App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');
    Route::get('/artisan/booking/{booking}', [App\Http\Controllers\BookingController::class, 'show'])->name('booking.artisan.show');
    Route::get('/client/booking/{booking}', [App\Http\Controllers\BookingController::class, 'clientShow'])->name('booking.client.show');
    Route::post('/artisan/booking/{booking}/status', [App\Http\Controllers\BookingController::class, 'artisanStatusUpdate'])->name('booking.artisan.status');
    Route::post('/client/booking/{booking}/approve', [App\Http\Controllers\BookingController::class, 'clientApprove'])->name('booking.client.approve');
    Route::post('/client/booking/{booking}/decline', [App\Http\Controllers\BookingController::class, 'clientDecline'])->name('booking.client.decline');
    Route::post('/client/booking/{booking}/verify', [App\Http\Controllers\BookingController::class, 'clientVerify'])->name('booking.client.verify');
    Route::get('/client/artisan/{id}', [App\Http\Controllers\DashboardController::class, 'viewArtisanProfile'])->name('client.artisan.profile');

    // Chat API
    Route::get('/api/booking/{booking}/messages', [App\Http\Controllers\MessageController::class, 'index'])->name('api.messages.index');
    Route::post('/api/booking/{booking}/messages', [App\Http\Controllers\MessageController::class, 'store'])->name('api.messages.store');
});
require __DIR__.'/auth.php';
