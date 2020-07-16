<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class TravelAuthenticate
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Closure  $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role == 0) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 1 || Auth::user()->role == 2) {
            return $next($request);
        }
    }
}
