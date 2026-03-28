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
    Route::post('/artisan/bio', [ArtisanController::class, 'updateBio'])->name('artisan.bio.update');
    Route::post('/artisan/portfolio', [ArtisanController::class, 'uploadPortfolioImage'])->name('artisan.portfolio.upload');
    Route::delete('/artisan/portfolio/{id}', [ArtisanController::class, 'deletePortfolioImage'])->name('artisan.portfolio.delete');
});
