<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
//    public function handle($request, Closure $next, ...$guards){
//        dd($guards);
//    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if(request()->is('admin/*')){
                return route('a-login');
            }else if(request()->is('employee/*')){
                return route("e-login");
            }
            return route('login');
        }
    }
}
