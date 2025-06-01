<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MidtransCallbackController;
use App\Http\Controllers\MidtransNotificationController;
use App\Http\Controllers\ReviewController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('landing-page');

// Contact Us
Route::get('/contact', function () {
    return view('client.contactUs');
})->name('contact');

Route::get('/about', function () {
    return view('client.aboutUs');
})->name('about');

// Auth Google
Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect'])->name('auth.google.redirect');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('auth.google.callback');

Route::get('/booking/confirm', [BookingController::class, 'showConfirmation'])->name('booking.confirmation');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/book', [BookingController::class, 'showBookingForm'])->name('booking.form');
    Route::post('/book', [BookingController::class, 'processBooking'])->name('booking.process');
    Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('my.bookings');
    Route::get('/my-bookings/{booking}/upload-payment-proof', [BookingController::class, 'showUploadForm'])->name('payment.upload.form');
    Route::post('/my-bookings/{booking}/upload-payment-proof', [BookingController::class, 'uploadPaymentProof'])->name('payment.upload.process');

    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});

require __DIR__ . '/auth.php';
