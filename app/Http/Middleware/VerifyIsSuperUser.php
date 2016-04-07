<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class VerifyIsSuperUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role->is_admin) {
            return $next($request);
        }

        abort(404);
    }
}
