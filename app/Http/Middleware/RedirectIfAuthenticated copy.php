<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{

    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        if (Auth::check()) {
            $role = Auth::user()->role?->nama;

            return match ($role) {
                'admin' => redirect('/admin'),
                'bidan' => redirect('/bidan'),
                'dokter' => redirect('/dokter'),
                default => redirect('/login'),
            };
        }

        return $next($request);
    }
}
