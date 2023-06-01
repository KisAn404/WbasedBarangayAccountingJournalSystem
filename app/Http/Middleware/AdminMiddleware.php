<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
    if (auth()->check()) {
        $user = auth()->user();
        $routeName = $request->route()->getName();

        if ($user->user_type == 'admin') {
            // Allow access to all routes
            return $next($request);
        } elseif ($user->user_type == 'barangay officials') {
            // Allow access to dashboard and reports routes only
            if (in_array($routeName, ['dashboard', 'admin.reports'])) {
                return $next($request);
            }
            
        }
    }

    // Redirect to unauthorized page for all other cases
    abort(403, 'You are not authorized to access this resource.');

}


}
