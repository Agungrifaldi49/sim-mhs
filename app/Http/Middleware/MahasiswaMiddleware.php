<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MahasiswaMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('mhs')->check()) {
            return redirect()->route('mahasiswa.login')->with('error', 'Silakan login sebagai Mahasiswa terlebih dahulu.');
        }

        return $next($request);
    }
}
