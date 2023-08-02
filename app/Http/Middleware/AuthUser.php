<?php

namespace App\Http\Middleware;

use Closure;

class AuthUser
{

    public function handle($request, Closure $next = null)
    {

        if (!isset(Auth()->user()->id)) {
            return redirect('login');
        }

        return $next($request);
    }
}
