<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate;

class AdminOrEmployeeMiddleware extends Authenticate
{
    protected function authenticate($request, array $guards)
    {
        if (empty($guards)) {
            $guards = [null];
        }

        foreach ($guards as $guard) {
            if ($this->auth->guard($guard)->check()) {
                return $this->auth->shouldUse($guard);
            }
        }
        return json_encode("You're not authenticated.");
    }
}
