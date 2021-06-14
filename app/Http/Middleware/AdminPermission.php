<?php

namespace App\Http\Middleware;

use Closure;

class AdminPermission
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
       if(\Auth::user()->role_id == 5 || \Auth::user()->role_id == 6){

        return $next($request);
    }
        return redirect('/admin');
    
    }
}
