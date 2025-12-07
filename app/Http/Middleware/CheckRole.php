<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role)
    {
        // Jika user login dan role sesuai
        if (Auth::check() && Auth::user()->role == $role) {
            return $next($request);
        }

        // Jika role salah → Error 403 Forbidden
        return abort(403, 'Akses ditolak');
    }
}
