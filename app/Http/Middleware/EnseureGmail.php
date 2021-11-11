<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class EnseureGmail
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
        //si el usuario está logeado y la cuenta no es de gmail
        if (
            !Auth::guest() &&
            explode('@', Auth::user()->email)[1] != 'hotmail.com'
        ) {
            return redirect('http://hotmail.com');
        }

        return $next($request); //sigue tu camino
    }
}
