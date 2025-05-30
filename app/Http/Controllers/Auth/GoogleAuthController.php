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

            // Cari pengguna berdasarkan google_id atau email
            $user = User::where('google_id', $googleUser->id)->orWhere('email', $googleUser->email)->first();

            if ($user) {
                $user->update([
                    'name' => $googleUser->name,
                    'google_id' => $googleUser->id,
                    'avatar_url' => $googleUser->getAvatar(),
                    'email_verified_at' => now(),
                ]);
            } else {
                $user = User::create([
                    'google_id' => $googleUser->id,
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'avatar_url' => $googleUser->getAvatar(),
                    'password' => Hash::make(Str::random(24)),
                    'email_verified_at' => now(),
                ]);
            }

            // Login kan user
            Auth::login($user);

            // Regenerate session
            request()->session()->regenerate();

            return redirect()->intended('/dashboard');

        } catch (\Throwable $e) {
            Log::error('Google Auth Callback Error: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return redirect('/login')->with('error', 'Login Google gagal: ' . $e->getMessage());
        }
    }
}