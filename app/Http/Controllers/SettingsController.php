<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
        return view("admin.settings.settings");
    }

    public function editAbout(){
        return view("admin.settings.editAbout");
    }

    public function updateAbout(Request $request){

    }

    public function editServices(){
        return view("admin.settings.editServices");
    }


    public function updateServices(){

    }


    public function editPrivacy(){
        return view("admin.settings.editPrivacy");
    }


    public function updatePrivacy(){

    }


    public function editTerms(){
        return view("admin.settings.editTerms");
    }

    public function updateTerms(){

    }
}
