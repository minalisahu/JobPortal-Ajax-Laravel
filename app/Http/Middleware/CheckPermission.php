<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermission {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission) {
        if (!$request->user()->hasPermission($permission)) {
            return back()->with('warning_message', __('You do not have sufficient permission to use this functionality.'));
        }
        return $next($request);
    }

}
