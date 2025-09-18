<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // ইউজার লগইন না করলে
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must login first.');
        }

        // ইউজার admin না হলে
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action. Admins only.');
        }

        return $next($request);
    }
}
