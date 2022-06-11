<?php

namespace App\Http\Middleware;

use Closure;

class CheckSubscription
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
        $tdate = date('Y-m-d');
        if(auth()->user()->e_date < $tdate){
            return redirect()->intended('stripe');
        }else{
            return $next($request);
        }         
    }
}
?>