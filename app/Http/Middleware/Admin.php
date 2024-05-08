<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Pengecekan apakah sudah login
        if (auth()->user()) {
            // Pengecekan admin
            if (auth()->user()->is_admin == 1)
                return $next($request);
            return redirect('/view')->with('error', 'You are restricted to enter this page');
        }
        return redirect('/login')->with('error', 'Anda belum login !');
    }
}
