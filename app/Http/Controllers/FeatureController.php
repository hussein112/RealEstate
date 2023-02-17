<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Property;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use function MongoDB\BSON\fromJSON;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * Insert the feature if it doesn't exist.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $propertyId = 0;
        foreach (json_decode($request->data) as $feature){
            if($feature == 'id'){
                $propertyId = $feature;
            }
            $_feature = Feature::where('feature', $feature)->first();
            if(! isset($_feature)){
                $newFeature = Feature::create([
                    'feature' => $feature
                ]);
                $featureId = $newFeature->id;
            }else{
                $featureId = $_feature->id;
            }
            $property = Property::find($propertyId);

            $property->features()->attach($featureId, ['property_id' => $propertyId]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
