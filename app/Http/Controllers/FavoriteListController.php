<?php

namespace App\Http\Controllers;

use App\Models\FavoriteList;
use Illuminate\Http\Request;

class FavoriteListController extends Controller
{
    public function store($property_id){
        FavoriteList::create([
            'user_id' => auth()->user()->id,
            'property_id' => $property_id
        ]);

        return redirect()->back()->with([
            'success_msg' => "Property Added Successfully"
        ]);
    }
}
