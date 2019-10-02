<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class BeforeMiddleWare
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
        if (Session::get('userName','Guest') == 'Guest'){
            return redirect("/login");
        }
        return $next($request);
    }
}
