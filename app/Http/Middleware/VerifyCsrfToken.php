<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        // Tambahkan path notifikasi Midtrans di sini
        'midtrans/callback', // <-- Pastikan path ini sesuai dengan route POST notifikasi Midtrans Anda
        // Jika Anda menggunakan path lain di route, sesuaikan di sini.
        // Contoh: 'midtrans/notification',

        // Anda bisa menambahkan path lain yang ingin dikecualikan di sini
        // 'api/*', // Contoh mengecualikan semua route di prefix /api
    ];
}