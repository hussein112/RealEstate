<?php

namespace App\Http\Middleware;

use App\Custom\getAuthRedirectUrl;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    use getAuthRedirectUrl;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if(isset($guards)){
            foreach ($guards as $guard){
                if (Auth::guard($guard)->check()) {
                    return redirect($this->getAuthRedirectUrl($guard));
                }
            }
        }

        return $next($request);
    }
}
