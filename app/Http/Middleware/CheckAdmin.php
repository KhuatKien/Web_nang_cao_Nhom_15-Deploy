<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role === 1) {
                return $next($request);
            } elseif (Auth::user()->role === 0) {
                return redirect('/loginadmin')->with('error', 'You do not have access to this page');
            }
        }
        // Redirect to admin login page if not authenticated or not admin
        return redirect('/login');
    }
}
