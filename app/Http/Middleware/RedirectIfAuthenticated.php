<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if ($user->users_types_id == 1) {
                return redirect('/categories');
            } else if ($user->users_types_id  == 2) {
                return redirect('/products');
            }else if ($user->users_types_id == 3) {
                return redirect('/productsBuyer');
            }
        }

        return $next($request);
    }
}
