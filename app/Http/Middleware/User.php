<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role==2){

            //its admin
            return $next($request);
        }
            //not admin redirect

            return redirect('home')->with('error','You can not access the admin area');

       
    }
}
