<?php

namespace App\Http\Controllers;

use App\Models\FavoriteList;
use Illuminate\Http\Request;

class FavoriteListController extends Controller
{
    /**
     * Store the given property into the favorite list of the currently authenticated user.
     *
     * @param Request $request
     * @param $property_id
     * @return \Illuminate\Http\RedirectResponse
     */
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


    /**
     * Delete the given property from the list
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        FavoriteList::destroy($id);
        return redirect()->back()->with("Property Removed Successfully");
    }
}
