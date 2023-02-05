<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home(){
        return view("home");
    }

    public function about(){
        return view("static.about");
    }


    public function contact(){
        return view("static.contact");
    }

    public function terms(){
        return view("static.terms");
    }

    public function partnerTerms(){
        return view("static.partnerTerms");
    }

    public function policy(){
        return view("static.policy");
    }

    public function services(){
        return view("static.services");
    }

    public function team(){
        return view("static.team");
    }
}
