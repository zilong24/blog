<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
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
        //登录验证
        /*if(!isset($_SESSION['user'])){
            return redirect('login');
        }*/
        dump( __METHOD__,session()->all());
        return $next($request);
    }
}
