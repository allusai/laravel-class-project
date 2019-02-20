<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Authenticated
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
        //Here we are adding a "Guard" to check if the user is logged in or not
        if(Auth::check()) {
            return $next($request);
        }
        else {
            return redirect('/login');
        }

        return $next($request); // This line says go ahead, and it comes with the middleware
    }
}
