<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::updateOrCreate(
                [
                    'google_id' => $googleUser->id,
                ],
                [
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => isset($user->password) ? $user->password : Hash::make(Str::random(24)),
                    'email_verified_at' => now(),
                ]
            );

            // Login kan user
            Auth::login($user);

            // Regenerate session
            request()->session()->regenerate();

            return redirect()->intended('/dashboard');

        } catch (\Throwable $th) {
            Log::error('Google Auth Callback Error: ' . $th->getMessage());

            // Redirect kembali ke halaman login dengan pesan error
            return redirect('/login')->with('error', 'Terjadi kesalahan saat login dengan Google. Silakan coba lagi.');
        }
    }
}