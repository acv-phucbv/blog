<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        $user = \Auth::user();

        if (\Auth::check() && \Auth::user()->isAdmin()) {
            return $next($request);
        }

        throw new \Illuminate\Auth\Access\AuthorizationException(trans('common.action_unauthorized'));
    }
}
