<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Midtrans\Notification;
use Illuminate\Support\Facades\Log;


class MidtransCallbackController extends Controller
{
    public function handle(Request $request)
    {
        Log::info('Midtrans callback received', $request->all());
        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $notification = new Notification();

        $orderId = $notification->order_id;
        $transactionStatus = $notification->transaction_status;
        $paymentType = $notification->payment_type;
        $fraudStatus = $notification->fraud_status ?? null;

        $bookingId = explode('-', $orderId)[0];
        $booking = Booking::find($bookingId);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        // Update status booking sesuai status Midtrans
        if ($transactionStatus == 'capture' || $transactionStatus == 'settlement') {
            $booking->status = 'paid';
            $booking->save();
        } elseif ($transactionStatus == 'cancel' || $transactionStatus == 'expire' || $transactionStatus == 'deny') {
            $booking->status = 'cancelled';
            $booking->save();
        }

        return response()->json(['message' => 'Notification handled']);
    }
}