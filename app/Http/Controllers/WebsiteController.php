<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Post;
use App\Models\Property;
use App\Models\Type;

class WebsiteController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function home(){
        return view("home")->with([
            'featured_properties' => Property::where('featured', 1)->get(),
            'latest_properties' => Property::where('featured', '<>', 1)->take(10)->orderBy('created_at', 'asc')->get(),
            'posts' => Post::select('*')->take(10)->get(),

//            For search
//            'locations' => Property::sele
            'fors' => Property::select('for')->distinct()->get(),
            'wheres' => Property::select('city')->distinct()->get(),
            'types' => Type::all(),
        ]);
    }

    /**
     * Display the about us page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function about(){
        return view("static.about")->with([
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all()
        ]);
    }

    /**
     * Display the contact us page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function contact(){
        return view("static.contact")->with([
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all(),
            'branches' => Branch::all()
        ]);
    }

    /**
     * Display the terms and conditions page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function terms(){
        return view("static.terms")->with([
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all(),
        ]);
    }

    /**
     * Display the terms for advertising.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function partnerTerms(){
        return view("static.partnerTerms")->with([
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all()
        ]);
    }

    /**
     * Display the privacy policy page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function privacy(){
        return view("static.privacy")->with([
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all()
        ]);
    }

    /**
     * Display the services page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function services(){
        return view("static.services")->with([
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all()
        ]);
    }

    /**
     * Display the team members page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function team(){
        return view("static.team")->with([
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all()
        ]);
    }
}
