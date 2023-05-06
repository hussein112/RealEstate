<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Post;
use App\Models\Property;
use App\Models\Type;

class WebsiteController extends Controller
{
    public function home(){
        return view("home")->with([
            'featured_properties' => Property::where('featured', 1)->get(),
            'latest_properties' => Property::select('*')->take(10)->orderBy('created_at', 'asc')->get(),
            'posts' => Post::select('*')->take(10)->get(),

//            For search
//            'locations' => Property::sele
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all(),
        ]);
    }

    public function about(){
        return view("static.about")->with([
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all()
        ]);
    }

    public function contact(){
        return view("static.contact")->with([
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all(),
            'branches' => Branch::all()
        ]);
    }

    public function terms(){
        return view("static.terms")->with([
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all(),
        ]);
    }

    public function partnerTerms(){
        return view("static.partnerTerms")->with([
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all()
        ]);
    }

    public function privacy(){
        return view("static.privacy")->with([
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all()
        ]);
    }

    public function services(){
        return view("static.services")->with([
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all()
        ]);
    }

    public function team(){
        return view("static.team")->with([
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all()
        ]);
    }
}
