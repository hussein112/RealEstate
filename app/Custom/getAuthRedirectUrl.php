<?php


namespace App\Custom;

use App\Providers\RouteServiceProvider;

trait getAuthRedirectUrl{

    public function getAuthRedirectUrl(String $guard) : String
    {
        switch($guard){
            case "admin":
                return RouteServiceProvider::ADMIN_HOME;
                break;
            case "employee":
                return RouteServiceProvider::EMPLOYEE_HOME;
                break;
            default:
                return RouteServiceProvider::HOME;
        }
    }

}
