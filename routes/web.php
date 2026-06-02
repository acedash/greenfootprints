<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (\Illuminate\Support\Facades\Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::post('/footprint', [\App\Http\Controllers\FootprintController::class, 'store'])->name('footprint.store');
    Route::get('/history', [\App\Http\Controllers\FootprintController::class, 'history'])->name('history');
    Route::get('/leaderboard', [\App\Http\Controllers\LeaderboardController::class, 'index'])->name('leaderboard');
    
    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/users', [\App\Http\Controllers\AdminController::class, 'users'])->name('admin.users');
        Route::get('/leaderboard', [\App\Http\Controllers\AdminController::class, 'leaderboard'])->name('admin.leaderboard');
        Route::get('/analytics', [\App\Http\Controllers\AdminController::class, 'analytics'])->name('admin.analytics');
    });
});

require __DIR__.'/auth.php';
