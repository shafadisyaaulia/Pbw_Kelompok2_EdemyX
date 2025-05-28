<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;


class AdminLoginController extends Controller
{
    /**
     * Menampilkan form login admin.
     */
    public function showLoginForm(): View
    {
        // Pastikan user biasa yang sudah login diarahkan pergi
        if (Auth::check() && Auth::user()->role !== 'admin') {
             // Redirect ke dashboard user biasa atau halaman lain
             return redirect()->route('dashboard'); // Ganti 'dashboard' jika perlu
        }
        // Jika admin sudah login, redirect ke admin dashboard
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return view('login-admin'); // Tampilkan view login admin
    }

    /**
     * Menangani percobaan login admin.
     */
    public function login(Request $request): RedirectResponse
    {
        // 1. Validasi Input
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        // 2. Coba Autentikasi (menggunakan guard default 'web')
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // 3. Autentikasi Berhasil, SEKARANG cek rolenya
            $user = Auth::user();

            if ($user->role === 'admin') {
                // 4. Jika Benar Admin
                $request->session()->regenerate(); // Regenerate session
                return redirect()->intended(route('admin.dashboard')); // Arahkan ke admin dashboard
            } else {
                // 5. Jika Bukan Admin (tapi kredensial user biasa benar)
                Auth::logout(); // Langsung logout lagi
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                // Kembalikan ke form login admin dengan pesan error spesifik
                throw ValidationException::withMessages([
                    'email' => __('auth.admin_only'), // Tambahkan pesan ini di lang
                ]);
                /* Alternatif pesan inline:
                return back()->withErrors([
                    'email' => 'You do not have administrator privileges.',
                ])->onlyInput('email');
                */
            }
        }

        // 6. Jika Autentikasi Gagal (email/password salah)
        throw ValidationException::withMessages([
            'email' => __('auth.failed'), // Pesan error standar Laravel
        ]);
        /* Alternatif pesan inline:
         return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
        */
    }

     /**
      * Menangani logout admin.
      */
     public function logout(Request $request): RedirectResponse
     {
         Auth::logout(); // Gunakan guard default jika tidak ada guard admin

         $request->session()->invalidate();
         $request->session()->regenerateToken();

         return redirect()->route('admin.login.form'); // Arahkan kembali ke form login admin
     }
}