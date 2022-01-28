<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class RedirectUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::user()) {
            $access = Auth::user()->access;

            if($access === "1"){

                return redirect(RouteServiceProvider::HOME);
            }
            if($access === "2"){

                return redirect(RouteServiceProvider::SEEKER);
            }
        }

        return $next($request);
    }
}
