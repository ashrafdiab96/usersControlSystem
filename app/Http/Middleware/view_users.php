<?php

namespace App\Http\Middleware;

use Closure;

class view_users
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
        if($request->user())
        {
            if($request->user()->role == 'owner' || $request->user()->role == 'it')
            {
                return $next($request);
            } else {
                return redirect('/notauth');
            }
        } else {
            return redirect('/notauth');
        }
    }
}
