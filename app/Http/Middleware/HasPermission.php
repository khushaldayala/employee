<?php

namespace App\Http\Middleware;

use Closure;

class HasPermission
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
        // $this->hasPermission();
        if(\Auth::user()->role_id==6 || \Auth::user()->role_id==5){
        return $next($request);
    }
        return redirect('/admin');
    }
}
