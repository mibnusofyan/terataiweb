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
use Midtrans\Config;
use Midtrans\Snap;

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
                $validator->errors()->add('quantities', 'Minimal harus ada 1 tiket yang dipesan.');
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

        foreach ($selectedQuantities as $ticketTypeId => $quantity) {
            $ticketType = $ticketTypes->get($ticketTypeId);

            // Cek apakah jenis tiket valid dan ada
            if (!$ticketType) {
                $validator->errors()->add("quantities.{$ticketTypeId}", 'Jenis tiket tidak valid.');
                throw new ValidationException($validator);
            }

            $itemPrice = $ticketType->price;
            $subtotal = $itemPrice * $quantity;
            $totalPrice += $subtotal;

            // Simpan data untuk booking item
            $bookingItemsData[] = [
                'ticket_type_id' => $ticketType->id,
                'quantity' => $quantity,
                'price_per_item' => $itemPrice,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }


        DB::transaction(function () use ($user, $validatedData, $totalPrice, $bookingItemsData, $ticketTypes, $selectedQuantities, &$booking) {
            $booking = Booking::create([
                'user_id' => $user->id,
                'booking_date' => $validatedData['booking_date'],
                'total_price' => $totalPrice,
                'status' => 'pending',
                'payment_proof' => null,
            ]);

            foreach ($bookingItemsData as $itemData) {
                $booking->bookingItems()->create($itemData);
            }
        });

        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Data transaksi untuk Snap
        $params = [
            'transaction_details' => [
                'order_id' => $booking->id . '-' . time(),
                'gross_amount' => $booking->total_price,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
        ];

        // Generate Snap Token
        $snapToken = Snap::getSnapToken($params);

        // Simpan snap_token ke booking (opsional, jika ingin)
        $booking->update(['snap_token' => $snapToken]);

        return redirect()->route('booking.confirmation')->with([
            'success' => 'Pesanan Anda berhasil dibuat! Silakan lakukan pembayaran.',
            'snap_token' => $snapToken,
        ]);
    }

    public function showConfirmation(Request $request)
    {
        $latestBooking = Auth::user()->bookings()->latest()->first();


        return view('client.booking.confirmation', compact('latestBooking'));
    }

    public function myBookings()
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        $bookings = $user->bookings()
            ->with(['bookingItems', 'bookingItems.ticketType'])
            ->latest()
            ->get();

        return view('client.booking.myBookings', compact('bookings'));
    }

    public function showUploadForm(Booking $booking)
    {
        if ($booking->user_id !== Auth::id() || $booking->status !== 'pending') {
            return redirect()->route('my.bookings')->with('error', 'Pesanan tidak ditemukan atau tidak bisa diunggah bukti transfer.');
        }

        return view('client.booking.uploadPayment', compact('booking'));
    }

    public function uploadPaymentProof(Request $request, Booking $booking)
    {
        if ($booking->user_id !== Auth::id() || $booking->status !== 'pending') {
            return redirect()->route('my.bookings')->with('error', 'Pesanan tidak ditemukan atau tidak bisa diunggah bukti transfer.');
        }

        $request->validate([
            'payment_proof' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg,pdf', 'max:2048'],
        ]);

        $filePath = $request->file('payment_proof')->store('payment-proofs', 'public');

        $booking->update([
            'payment_proof' => $filePath,
            'status' => 'awaiting_confirmation',
        ]);

        return redirect()->route('my.bookings')->with('success', 'Bukti transfer berhasil diunggah. Pesanan Anda akan segera diproses setelah diverifikasi admin.');
    }
}