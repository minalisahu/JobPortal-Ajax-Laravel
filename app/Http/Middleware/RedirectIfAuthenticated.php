<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
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
            if (Auth::user()) {
                $access = Auth::user()->access;
                switch ($access) {
                    case '1':
                        return redirect(RouteServiceProvider::HOME);
                        break;

                    case '2':
                        return redirect(RouteServiceProvider::SEEKER);
                        break;

                    default:
                        return redirect(RouteServiceProvider::HOME);
                        break;
                }
            }

        }
        return $next($request);
    }
}
