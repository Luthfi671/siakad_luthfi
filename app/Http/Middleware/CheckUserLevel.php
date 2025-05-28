<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class CheckUserLevel
{
    public function handle($request, Closure $next, $level)
    {
        if (Auth::check() && Auth::user()->level == $level) {
            return $next($request);
        }

        // Logout dan redirect jika level tidak sesuai
        Auth::logout();
        return redirect()->route('login')->with('error', 'Tidak memiliki akses.');
    }
}
