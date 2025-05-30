<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketType;
use App\Models\Booking;
use App\Models\BookingItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{
    public function showBookingForm(Request $request)
    {
        $ticketTypes = TicketType::all();

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('client.booking.index', compact('ticketTypes'));
    }

    public function processBooking(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'booking_date' => ['required', 'date', 'after_or_equal:' . now()->toDateString()],
            'quantities' => ['required', 'array'],
            'quantities.*' => ['integer', 'min:0'],
        ]);

        $validator->after(function ($validator) use ($request) {
            $totalQuantity = collect($request->input('quantities'))->sum();
            if ($totalQuantity <= 0) {
                $validator->errors()->add('quantities', 'Anda harus memilih setidaknya satu tiket.');
            }
        });

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $validatedData = $validator->validated();

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk melakukan pemesanan.');
        }
        $user = Auth::user();

        $selectedQuantities = array_filter($validatedData['quantities']);
        $ticketTypeIds = array_keys($selectedQuantities);

        $ticketTypes = TicketType::whereIn('id', $ticketTypeIds)->get()->keyBy('id');

        $totalPrice = 0;
        $bookingItemsData = [];
        $booking = null; // Initialize booking variable

        foreach ($selectedQuantities as $ticketTypeId => $quantity) {
            $ticketType = $ticketTypes->get($ticketTypeId);

            if (!$ticketType) {
                // This case should ideally be handled by validation or frontend
                // For robustness, you might want to add an error or skip
                continue;
            }

            $itemPrice = $ticketType->price;
            $subtotal = $itemPrice * $quantity;
            $totalPrice += $subtotal;

            $bookingItemsData[] = [
                'ticket_type_id' => $ticketTypeId,
                'quantity' => $quantity,
                'price_per_item' => $itemPrice, // Corrected: Changed 'price_per_ticket' to 'price_per_item'
                                         // Removed 'subtotal' as it's likely not a direct column
            ];
        }


        DB::transaction(function () use ($user, $validatedData, $totalPrice, $bookingItemsData, &$booking) {
            $booking = Booking::create([
                'user_id' => $user->id,
                'booking_date' => $validatedData['booking_date'],
                'total_price' => $totalPrice,
                'status' => 'pending', // Default status for manual payment
            ]);

            foreach ($bookingItemsData as $itemData) {
                $booking->bookingItems()->create($itemData);
            }
        });


        // Redirect to confirmation page with a message to upload payment proof
        return redirect()->route('booking.confirmation')->with([
            'success' => 'Pesanan berhasil dibuat. Silakan unggah bukti pembayaran Anda.',
            'booking_id' => $booking->id, // Pass booking_id to confirmation page
        ]);
    }

    public function showConfirmation(Request $request)
    {
        $bookingId = session('booking_id');
        $latestBooking = null;

        if ($bookingId) {
            $latestBooking = Auth::user()->bookings()->with('bookingItems.ticketType')->find($bookingId);
        }

        if (!$latestBooking) {
            // Fallback or if the user directly accesses this page without a recent booking in session
            // You might want to redirect them or show a generic message
            return redirect()->route('my.bookings')->with('info', 'Tidak ada detail konfirmasi pesanan yang ditemukan. Lihat riwayat pesanan Anda.');
        }

        return view('client.booking.confirmation', compact('latestBooking'));
    }

    public function myBookings()
    {
        $user = Auth::user();
        // Eager load booking items and their ticket types
        $bookings = $user->bookings()->with('bookingItems.ticketType')->orderBy('created_at', 'desc')->get();
        return view('client.booking.myBookings', compact('bookings'));
    }

    public function showUploadForm(Booking $booking)
    {
        // Ensure the user owns the booking and the status is 'pending'
        if ($booking->user_id !== Auth::id() || $booking->status !== 'pending') {
            abort(403, 'Anda tidak diizinkan untuk mengunggah bukti pembayaran untuk pesanan ini atau status pesanan tidak memungkinkan.');
        }
        return view('client.booking.uploadPayment', compact('booking'));
    }

    public function uploadPaymentProof(Request $request, Booking $booking)
    {
        // Ensure the user owns the booking and the status is 'pending'
        if ($booking->user_id !== Auth::id() || $booking->status !== 'pending') {
            abort(403, 'Tindakan tidak diizinkan.');
        }

        $request->validate([
            // Added pdf to allowed mimes
            'payment_proof' => ['required', 'file', 'mimes:jpeg,png,jpg,gif,svg,pdf', 'max:2048'],
        ]);

        $filePath = $request->file('payment_proof')->store('payment-proofs', 'public');

        $booking->update([
            'payment_proof' => $filePath, // Corrected: Save the path to the 'payment_proof' column
            'status' => 'awaiting_confirmation', // Update status
            // snap_token related updates are removed
        ]);

        return redirect()->route('my.bookings')->with('success', 'Bukti transfer berhasil diunggah. Pesanan Anda akan segera diproses setelah diverifikasi admin.');
    }
}