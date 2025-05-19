<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MidtransCallbackController;
use App\Http\Controllers\MidtransNotificationController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('landing-page');

// Auth Google
Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect'])->name('auth.google.redirect');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('auth.google.callback');


Route::get('/booking/confirm', [BookingController::class, 'showConfirmation'])->name('booking.confirmation');
Route::post('/midtrans/notification', [MidtransNotificationController::class, 'handleNotification']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::post('/midtrans/callback', [MidtransCallbackController::class, 'handle'])
    ->withoutMiddleware([VerifyCsrfToken::class]);

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
