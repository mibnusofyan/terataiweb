<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('landing-page');

// Auth Google
Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect'])->name('auth.google.redirect');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('auth.google.callback');


Route::get('/booking/confirm', [BookingController::class, 'showConfirmation'])->name('booking.confirmation');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/book', [BookingController::class, 'showBookingForm'])->name('booking.form');
    Route::post('/book', [BookingController::class, 'processBooking'])->name('booking.process');
    Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('my.bookings');
    Route::get('/my-bookings/{booking}/upload-payment-proof', [BookingController::class, 'showUploadForm'])->name('payment.upload.form');
    Route::post('/my-bookings/{booking}/upload-payment-proof', [BookingController::class, 'uploadPaymentProof'])->name('payment.upload.process');
});

require __DIR__ . '/auth.php';
