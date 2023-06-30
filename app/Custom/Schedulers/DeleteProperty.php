<?php

namespace App\Custom\Schedulers;

use App\Models\Property;

class DeleteProperty
{

    public function __invoke()
    {
        $properties = Property::all();
        foreach($properties as $property){
            if($property->until == date("Y-m-d")){
                Property::destroy($property->id);
            }
        }
    }
}
