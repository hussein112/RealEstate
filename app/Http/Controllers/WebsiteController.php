<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Property;
use App\Models\Type;

class WebsiteController extends Controller
{
    public function home(){
        return view("home")->with([
            'featured_properties' => Property::where('featured', 1)->get(),
            'latest_properties' => Property::select('*')->take(10)->get(),
            'posts' => Post::select('*')->take(10)->get(),

//            For search
//            'locations' => Property::sele
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all(),
        ]);
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
