<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIsLogin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Jika BELUM login → redirect ke halaman login
        if (!Auth::check()) {
            return redirect()->route('auth.index')->with('error', 'silakan login dlu.');
        }

        // Jika SUDAH login → lanjutkan request
        return $next($request);
    }
}
