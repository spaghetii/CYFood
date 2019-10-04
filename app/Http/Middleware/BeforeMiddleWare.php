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
        if ($_SERVER ["REQUEST_URI"]=='/loginHomepage') {
            if (Session::get('userName','Guest') == 'Guest'){
                return redirect("/login");
            }
        }else if($_SERVER['REQUEST_URI'] == '/'){
            if (Session::get('userName','Guest') != 'Guest'){
                return redirect("/loginHomepage");
            }
        }
        return $next($request);
    }
}
