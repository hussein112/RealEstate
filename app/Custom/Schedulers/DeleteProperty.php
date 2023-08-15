<?php

namespace App\Custom\Schedulers;

use App\Models\Property;
use Illuminate\Support\Carbon;

class DeleteProperty
{

    public function __invoke()
    {
        $properties = Property::all();
        foreach($properties as $property){
            $until = Carbon::createFromFormat("Y-m-d", $property->until);
            $now = Carbon::createFromFormat("Y-m-d", date("Y-m-d"));
            if($until->gte($now)){
                Property::destroy($property->id);
            }
        }
    }
}
