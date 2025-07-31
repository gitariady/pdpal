<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$levels): Response
    {
        // Pastikan sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Ambil level user
        $userLevel = Auth::user()->level;

        // Cek apakah level user ada di daftar level yang diizinkan
        if (in_array($userLevel, $levels)) {
            return $next($request); // lanjut ke controller
        }

        // Kalau level tidak cocok, tampilkan 403
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }
}

