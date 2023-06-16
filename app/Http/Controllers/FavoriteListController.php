<?php

namespace App\Http\Controllers;

use App\Models\FavoriteList;
use Illuminate\Http\Request;

class FavoriteListController extends Controller
{
    public function store(Request $request, $property_id){
        if(FavoriteList::where('property_id', $property_id)->exists()){
            return redirect()->back()->with('info_message', 'Property already exists in favorites');
        }

        FavoriteList::create([
            'user_id' => auth()->user()->id,
            'property_id' => $property_id
        ]);

        return redirect()->back()->with('success_msg', "Property Added Successfully");
    }


    public function destroy($id){
        FavoriteList::destroy($id);
        return redirect()->back()->with("Property Removed Successfully");
    }
}
