<?php

namespace App\Http\Middleware;

use Closure;

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
        if (Auth::user()->is_superuser) {
            return $next($request);
        }

        abort(404);
    }
}
