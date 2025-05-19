<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking; // Pastikan import model Booking
use Midtrans\Config;
use Midtrans\Notification; // Import class Notification dari Midtrans

class MidtransNotificationController extends Controller
{
    public function handleNotification(Request $request)
    {
        // Set konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Buat instance notifikasi Midtrans
        // Laravel akan otomatis menangani input JSON dari POST request
        $notification = new Notification();

        $transactionStatus = $notification->transaction_status;
        $orderId = $notification->order_id;
        $fraudStatus = $notification->fraud_status;

        // Cari pesanan berdasarkan order_id yang dikirim Midtrans
        // Ingat order_id Anda formatnya 'id-timestamp'
        $bookingId = explode('-', $orderId)[0];
        $booking = Booking::find($bookingId);

        // Cek apakah pesanan ditemukan
        if (!$booking) {
            // Pesanan tidak ditemukan, log error atau return 404
            return response()->json(['message' => 'Booking not found'], 404);
        }

        // Lakukan update status berdasarkan status transaksi dari Midtrans
        // Pastikan status hanya diupdate jika booking masih 'pending'
        if ($booking->status == 'pending') {
            if ($transactionStatus == 'capture') {
                if ($fraudStatus == 'challenge') {
                    // TODO: set transaction status on your database to 'challenge'
                    $booking->status = 'challenge'; // Contoh status custom
                } else if ($fraudStatus == 'accept') {
                    // TODO: set transaction status on your database to 'success'
                    $booking->status = 'completed'; // Atau 'success'
                }
            } else if ($transactionStatus == 'settlement') {
                // TODO: set transaction status on your database to 'success'
                $booking->status = 'completed'; // Pembayaran berhasil via metode non-kartu/capture
            } else if ($transactionStatus == 'pending') {
                // TODO: set transaction status on your database to 'pending' / 'waiting payment'
                $booking->status = 'pending'; // Status tetap pending (misal: menunggu transfer)
            } else if ($transactionStatus == 'deny') {
                // TODO: set transaction status on your database to 'deny'
                $booking->status = 'failed'; // Pembayaran ditolak
            } else if ($transactionStatus == 'expire') {
                // TODO: set transaction status on your database to 'expire'
                $booking->status = 'expired'; // Transaksi kadaluarsa
            } else if ($transactionStatus == 'cancel') {
                // TODO: set transaction status on your database to 'cancel'
                $booking->status = 'cancelled'; // Transaksi dibatalkan
            }
            // Tambahkan penanganan status lain jika perlu (misal: refund, partial_refund)
        }
        // Jika status sudah bukan pending, abaikan notifikasi ini atau log sebagai info

        // Simpan perubahan status ke database
        $booking->save();

        // Return response 200 OK ke Midtrans agar Midtrans tahu notifikasi berhasil diterima
        return response()->json(['message' => 'Notification processed successfully'], 200);
    }
}