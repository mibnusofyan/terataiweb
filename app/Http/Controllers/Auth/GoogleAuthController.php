<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request; // <-- Import Request
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Contracts\User as SocialiteUser; // <-- Import kontrak untuk type hinting

class GoogleAuthController extends Controller
{
    /**
     * Redirect pengguna ke halaman autentikasi Google.
     *
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Tangani callback dari Google setelah autentikasi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback(Request $request) // <-- Gunakan dependency injection untuk Request
    {
        try {
            /** @var SocialiteUser $socialiteUser */
            $socialiteUser = Socialite::driver('google')->user();

            // 1. Coba cari user berdasarkan google_id
            $user = User::where('google_id', $socialiteUser->getId())->first();

            if ($user) {
                // User ditemukan dengan google_id, update data jika perlu
                $user->update([
                    'name' => $socialiteUser->getName(),
                    'avatar_url' => $socialiteUser->getAvatar(),
                    // Email dari Google bisa jadi berbeda, pertimbangkan kebijakan update email Anda.
                    // Jika email di user model unik dan email dari Google sudah dipakai user lain, ini akan error.
                    // 'email' => $socialiteUser->getEmail(),
                    'email_verified_at' => now(), // Email dari Google dianggap terverifikasi
                ]);
            } else {
                // 2. Jika tidak ketemu dengan google_id, coba cari berdasarkan email
                $user = User::where('email', $socialiteUser->getEmail())->first();

                if ($user) {
                    // User ditemukan dengan email, update dengan data Google
                    $user->update([
                        'google_id' => $socialiteUser->getId(),
                        'name' => $socialiteUser->getName(), // Atau pertahankan nama lama jika diinginkan
                        'avatar_url' => $socialiteUser->getAvatar(),
                        'email_verified_at' => now(),
                    ]);
                } else {
                    // 3. Jika tidak ketemu juga, buat user baru
                    $user = User::create([
                        'google_id' => $socialiteUser->getId(),
                        'name' => $socialiteUser->getName(),
                        'email' => $socialiteUser->getEmail(),
                        'avatar_url' => $socialiteUser->getAvatar(),
                        'password' => Hash::make(Str::random(24)), // Password acak untuk user Google
                        'email_verified_at' => now(),
                    ]);
                }
            }

            // Login kan user
            Auth::login($user, true); // Parameter kedua true untuk "remember me"

            // Regenerate session
            $request->session()->regenerate();

            // Redirect ke halaman yang dituju atau default (misalnya 'my.bookings')
            // Penggunaan `absolute: false` sudah baik untuk route name.
            return redirect()->intended(route('my.bookings', absolute: false));

        } catch (\Throwable $e) {
            Log::error('Google Auth Callback Error: ' . $e->getMessage(), [
                'exception' => $e, // Log objek exception untuk detail lebih
                // 'trace' => $e->getTraceAsString() // Ini bisa sangat panjang, opsional
            ]);

            // Ambil pesan error yang lebih ramah jika ini adalah exception dari Socialite
            $errorMessage = 'Terjadi kesalahan saat login dengan Google.';
            if ($e instanceof \Laravel\Socialite\Two\InvalidStateException) {
                $errorMessage = 'Sesi autentikasi tidak valid. Silakan coba lagi.';
            } elseif (method_exists($e, 'getResponse') && $e->getResponse()) {
                // Coba ambil pesan dari GuzzleException jika ada
                $responseBody = (string) $e->getResponse()->getBody();
                $decodedResponse = json_decode($responseBody, true);
                if (isset($decodedResponse['error_description'])) {
                    $errorMessage = 'Login Google gagal: ' . $decodedResponse['error_description'];
                } elseif (isset($decodedResponse['error']['message'])) {
                    $errorMessage = 'Login Google gagal: ' . $decodedResponse['error']['message'];
                } else {
                    $errorMessage = 'Login Google gagal: ' . $e->getMessage();
                }
            } else {
                $errorMessage = 'Login Google gagal: ' . $e->getMessage();
            }


            return redirect('/login')->with('error', $errorMessage);
        }
    }
}