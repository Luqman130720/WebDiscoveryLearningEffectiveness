<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperatorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and has the 'operator' role
        if (!Auth::check() || Auth::user()->role !== 'operator') {
            return redirect('/login/operator'); // Redirect to home or login page
        }

        return $next($request);
    }
}