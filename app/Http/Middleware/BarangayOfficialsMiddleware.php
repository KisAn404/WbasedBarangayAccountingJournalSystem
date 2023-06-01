<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BarangayOfficialsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->user_type == 'barangay officials') {
            return $next($request);
        }
    
        return redirect('/dashboard');
    }
    
}