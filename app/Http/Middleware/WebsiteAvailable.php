<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Log;

class WebsiteAvailable
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
        //Here we are adding a "Guard" to check if the maintenance mode is on or not
        $command = DB::table('configurations')->select('value')->where('name','=','maintenance')->first();
        $value = $command->value;

        if($value == "off") {
            info("Value is off");
            return $next($request);
        }
        else {
            info("Redirecting to the maintenance page yo");
            return redirect('/maintenance');
        }

        return $next($request); // This line says go ahead, and it comes with the middleware
    }
}
