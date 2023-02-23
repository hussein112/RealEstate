<?php


namespace App\Custom;

use App\Providers\RouteServiceProvider;
use PhpParser\Node\Scalar\String_;

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

    public function getLogoutRedirectUrl($guard){
        switch($guard){
            case "admin":
                return '/admin/login';
                break;
            case "employee":
                return '/employee/login';
                break;
            default:
                return RouteServiceProvider::HOME;
        }
    }
}
