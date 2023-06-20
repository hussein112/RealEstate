<?php


namespace App\Custom;

use App\Models\Advertise;
use App\Models\Assign;
use App\Models\Employee;
use App\Models\Enquiry;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

trait MaxImagesPerProperty{
    public static function getMax(){
        $capacity_ = Storage::get('website/settings.txt');
        $settings = explode(',', $capacity_);
        foreach ($settings as $setting){
            if(! strstr($setting, 'mipp') == false){
                $temp = explode("-", $setting);
                return (int)end($temp);
            }
        }
    }
}
