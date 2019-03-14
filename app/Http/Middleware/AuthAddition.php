<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthAddition
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next, $guard = null)
     {
       if(Auth::guard('admins')->user())
       {
           return $next($request);
       }
       else if (Auth::guard($guard)->user() || Auth::guard(null)->guest())
       {
            if ($request->ajax()) {
               return response('Unauthorized.', 401);
            } else {
               return redirect()->route('index');
            }
       }


         return redirect()->route('frontend.index');
     }
}
