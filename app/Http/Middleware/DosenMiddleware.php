<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class DosenMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('dosen')->check()) {
            return redirect()->route('dosen.login')->with('error', 'Silakan login sebagai Dosen terlebih dahulu.');
        }

        return $next($request);
    }
}
