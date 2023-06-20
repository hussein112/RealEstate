<?php

namespace App\Http\Controllers;

use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    /**
     * Clean the given WYSWYG contents.
     *
     * @param $content
     * @return string
     */
    public function clean($content){
        $purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());
        return $purifier->purify($content);
    }


    /**
     * Display settings control panel
     */
    public function index(){
        return view("admin.settings.settings");
    }

    /**
     * Display the form for editing the "About Us Page"
     */
    public function editAbout(){
        return view("admin.settings.editAbout");
    }

    /**
     * Update the "about us" page.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAbout(Request $request){
        $clean_data = $this->clean($request->get('content'));
        Storage::disk('local')->put('website/about/about.txt', $clean_data);
        Storage::disk('local')->put('website/about/quote.txt', $request->get('quote'));
        return redirect()->back()->with([
            'success_msg' => 'About us page updated successfully.'
        ]);
    }

    /**
     * Display the form for editing "Services" page.
     */
    public function editServices(){
        return view("admin.settings.editServices");
    }


    /**
     * Update the "Services" page.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateServices(Request $request){
        $clean_data = $this->clean($request->get('content'));
        Storage::disk('local')->put('website/services/services.txt', $clean_data);
        Storage::disk('local')->put('website/services/quote.txt', $request->get('quote'));
        return redirect()->back()->with([
            'success_msg' => 'Services page updated successfully.'
        ]);
    }


    /**
     * Display the form for editing the "Privacy Policy" page.
     */
    public function editPrivacy(){
        return view("admin.settings.editPrivacy");
    }


    /**
     * Update the privacy policy page content.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePrivacy(Request $request){
        $clean_data = $this->clean($request->get('content'));
        Storage::disk('local')->put('website/privacy/privacy.txt', $clean_data);
        Storage::disk('local')->put('website/privacy/quote.txt', $request->get('quote'));
        return redirect()->back()->with([
            'success_msg' => 'Privacy Policy page updated successfully.'
        ]);
    }


    /**
     * Display the form for editing "Terms & Conditions" Page.
     */
    public function editTerms(){
        return view("admin.settings.editTerms");
    }

    /**
     * Update the "Terms & Conditions" page content.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateTerms(Request $request){
        $clean_data = $this->clean($request->get('content'));
        Storage::disk('local')->put('website/terms/terms.txt', $clean_data);
        Storage::disk('local')->put('website/terms/quote.txt',$request->get('quote'));
        return redirect()->back()->with([
            'success_msg' => 'Terms & conditions page updated successfully.'
        ]);
    }

    /**
     * Edit the "Advertisement Rules" page.
     */
    public function editAdvertise(){
        return view("admin.settings.editAdvertise");
    }

    /**
     * Update the "Advertisement Rules" page content.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAdvertise(Request $request){
        $clean_data = $this->clean($request->get('content'));
        Storage::disk('local')->put('website/advertise/advertise.txt', $clean_data);
        Storage::disk('local')->put('website/advertise/quote.txt', $request->get('quote'));
        return redirect()->back()->with([
            'success_msg' => 'advertise page updated successfully.'
        ]);
    }

    /**
     * Display the form for editing "Contact Us" Page.
     */
    public function editContact(){
        return view("admin.settings.editContact");
    }

    /**
     * Update the content of "Contact Us" Page.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateContact(Request $request){
        $clean_data = $this->clean($request->get('content'));
        Storage::disk('local')->put('website/terms/terms.txt', $clean_data);
        Storage::disk('local')->put('website/terms/quote.txt', $request->get('quote'));
        return redirect()->back()->with([
            'success_msg' => 'Contact us page updated successfully.'
        ]);
    }


    /**
     * Display the page for available emails within the company.
     */
    public function editEmails(){
        return view("admin.settings.editEmails");
    }

    /**
     * Display the form for editing specific email message text.
     *
     * @param $email
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function editEmail($email){
        return view("admin.settings.editEmail")->with(['email' => $email]);
    }

    /**
     * Update the email texts
     *
     * @param Request $request
     * @param $email
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateEmail(Request $request, $email){
        $directory = (substr($email, 0, 1) == "a") ? "advertise" : "valuation";
        $type = (substr($email, 2, 1) == "a") ? "approved" : "rejected";
        Storage::disk('local')->put('website/email/' . $directory . '/' . $type . '/body.txt', $request->get('body'));
        Storage::disk('local')->put('website/email/' . $directory . '/' . $type . '/title.txt', $request->get('title'));
        return redirect()->back()->with([
            'success_msg' => 'Email template updated successfully.'
        ]);
    }

    /**
     * Update the employee capacity to handle tasks.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateEmployeeCapacity(Request $request){
        $file_contents = Storage::get('website/settings.txt');
        $capacity = 'ec-' . $request->get("capacity");
        $settings = explode(',', $file_contents);
        foreach ($settings as $setting){
            $old_str = strstr($setting, 'ec');
            if(! $old_str == false){
                $new_setting = str_replace($old_str, $capacity, $file_contents);
                Storage::disk('local')->put('website/settings.txt', $new_setting);
            }
        }
        return redirect()->back()->with('success_msg', 'Employee Capacity Updated.');
    }

    /**
     * Update the maximum number of images allowed for each property.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePropertyMaxImages(Request $request){
        $file_contents = Storage::get('website/settings.txt');
        $capacity = 'mipp-' . $request->get("max");
        $settings = explode(',', $file_contents);
        foreach ($settings as $setting){
            $old_str = strstr($setting, 'mipp');
            if(! $old_str == false){
                $new_setting = str_replace($old_str, $capacity, $file_contents);
                Storage::disk('local')->put('website/settings.txt', $new_setting);
            }
        }
        return redirect()->back()->with('success_msg', 'Max Images Updated.');
    }

    /**
     * Update the maximum number of features allowed for each property.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePropertyMaxFeatures(Request $request){
        $file_contents = Storage::get('website/settings.txt');
        $capacity = 'mfpp-' . $request->get("max");
        $settings = explode(',', $file_contents);
        foreach ($settings as $setting){
            $old_str = strstr($setting, 'mfpp');
            if(! $old_str == false){
                $new_setting = str_replace($old_str, $capacity, $file_contents);
                Storage::disk('local')->put('website/settings.txt', $new_setting);
            }
        }
        return redirect()->back()->with('success_msg', 'Max Features Updated.');
    }
}
