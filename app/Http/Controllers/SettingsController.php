<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index(){
        return view("admin.settings.settings");
    }

    public function editAbout(){
        return view("admin.settings.editAbout");
    }

    public function updateAbout(Request $request){
        Storage::disk('local')->put('website/about/about.txt', $request->get('content'));
        Storage::disk('local')->put('website/about/quote.txt', $request->get('quote'));
        return redirect()->back()->with([
            'sucess_msg' => 'About us page updated successfulyy'
        ]);
    }

    public function editServices(){
        return view("admin.settings.editServices");
    }


    public function updateServices(Request $request){
        Storage::disk('local')->put('website/services/services.txt', $request->get('content'));
        Storage::disk('local')->put('website/services/quote.txt', $request->get('quote'));
        return redirect()->back()->with([
            'sucess_msg' => 'Services page updated successfulyy'
        ]);
    }


    public function editPrivacy(){
        return view("admin.settings.editPrivacy");
    }


    public function updatePrivacy(Request $request){
        Storage::disk('local')->put('website/privacy/privacy.txt', $request->get('content'));
        Storage::disk('local')->put('website/privacy/quote.txt', $request->get('quote'));
        return redirect()->back()->with([
            'sucess_msg' => 'Privacy Policy page updated successfulyy'
        ]);
    }


    public function editTerms(){
        return view("admin.settings.editTerms");
    }

    public function updateTerms(Request $request){
        Storage::disk('local')->put('website/terms/terms.txt', $request->get('content'));
        Storage::disk('local')->put('website/terms/quote.txt', $request->get('quote'));
        return redirect()->back()->with([
            'sucess_msg' => 'Terms & conditions page updated successfulyy'
        ]);
    }


    public function editAdvertise(){
        return view("admin.settings.editAdvertise");
    }

    public function updateAdvertise(Request $request){
        Storage::disk('local')->put('website/advertise/advertise.txt', $request->get('content'));
        Storage::disk('local')->put('website/advertise/quote.txt', $request->get('quote'));
        return redirect()->back()->with([
            'sucess_msg' => 'advertise page updated successfuly'
        ]);
    }

    public function editContact(){
        return view("admin.settings.editContact");
    }

    public function updateContact(Request $request){
        Storage::disk('local')->put('website/terms/terms.txt', $request->get('content'));
        Storage::disk('local')->put('website/terms/quote.txt', $request->get('quote'));
        return redirect()->back()->with([
            'sucess_msg' => 'Contact us page updated successfulyy'
        ]);
    }



    public function editEmails(){
        return view("admin.settings.editEmails");
    }


    public function editEmail($email){
        return view("admin.settings.editEmail")->with(['email' => $email]);
    }

    public function updateEmail(Request $request, $email){
        $directory = (substr($email, 0, 1) == "a") ? "advertise" : "valuation";
        $type = (substr($email, 2, 1) == "a") ? "approved" : "rejected";
        Storage::disk('local')->put('website/email/' . $directory . '/' . $type . '/body.txt', $request->get('body'));
        Storage::disk('local')->put('website/email/' . $directory . '/' . $type . '/title.txt', $request->get('title'));
        return redirect()->back()->with([
            'sucess_msg' => 'Email template updated successfuly'
        ]);
    }
}
