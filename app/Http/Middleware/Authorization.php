<?php

namespace App\Http\Middleware;

use Closure;

class Authorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$permission)
    {
        // dd($permission);
        if(!$request->user()->can($permission))
        {
            abort(401);
        }
        return $next($request);
    }
}
