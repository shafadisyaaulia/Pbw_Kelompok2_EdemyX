<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login DAN memiliki role 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Lanjutkan request jika admin
        }

        // Jika tidak login atau bukan admin, redirect atau beri error 403
        // abort(403, 'Unauthorized action.'); // Opsi 1: Tampilkan error 403
        return redirect()->route('login')->with('error', 'You do not have access to this section.'); // Opsi 2: Redirect ke login user biasa dengan pesan
        // return redirect()->route('dashboard')->with('error', 'You do not have access to this section.'); // Opsi 3: Redirect ke dashboard user biasa
    }
}