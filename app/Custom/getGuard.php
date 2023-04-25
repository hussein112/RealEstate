<?php

namespace App\Custom;


trait getGuard{
    public function getGuard(){
        // 0 -> web (middleware groups, defaults in laravel)
        $guard = request()->route()->middleware()[1];
        $guard_arr = explode(":", $guard);
        return end($guard_arr);
    }
}
