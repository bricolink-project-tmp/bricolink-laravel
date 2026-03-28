<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArtisanController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::middleware('auth')->group(function () {
    // Profile & Settings
    Route::get('/artisan/settings', [ArtisanController::class, 'settings'])->name('artisan.settings');
    Route::post('/artisan/availability', [ArtisanController::class, 'toggleAvailability'])->name('artisan.availability.toggle');
    Route::post('/artisan/profile', [ArtisanController::class, 'updateProfile'])->name('artisan.profile.update');
    Route::post('/artisan/portfolio', [ArtisanController::class, 'uploadPortfolioImage'])->name('artisan.portfolio.upload');
    Route::delete('/artisan/portfolio/{id}', [ArtisanController::class, 'deletePortfolioImage'])->name('artisan.portfolio.delete');

    // Dual-Approval Booking System
    Route::post('/booking/{artisanId}', [App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');
    Route::post('/artisan/booking/{booking}/status', [App\Http\Controllers\BookingController::class, 'artisanStatusUpdate'])->name('booking.artisan.status');
    Route::post('/client/booking/{booking}/approve', [App\Http\Controllers\BookingController::class, 'clientApprove'])->name('booking.client.approve');
    Route::post('/client/booking/{booking}/decline', [App\Http\Controllers\BookingController::class, 'clientDecline'])->name('booking.client.decline');
    Route::post('/client/booking/{booking}/verify', [App\Http\Controllers\BookingController::class, 'clientVerify'])->name('booking.client.verify');
});
