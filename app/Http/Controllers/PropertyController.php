<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPropertyRequest;
use App\Models\Customer;
use App\Models\Image;
use App\Models\Property;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{

    protected int $paginate = 12;

    /********************* START READ METHODS (USER) *********************/

    /**
     * Display all Properties
     */
    public function index()
    {
        return view("properties")->with([
            'properties' => Property::paginate($this->paginate),
            'page' => 'all'
        ]);
    }


    /**
     * Display all Featured Properties
     */
    public function featured(){
        return view('properties')->with([
            'properties' => Property::where('featured', '1')->paginate($this->paginate),
            'page' => 'featured'
        ]);
    }

    /**
     * Display the specified Property.
     * @param  int  $id
     */
    public function show($id)
    {
        return view('property')->with([
            'property' => Property::find($id)
        ]);
    }

    /**
     * Display properties for buy only
     */
    public function buy(){
        return view("properties")->with([
            'properties' => Property::where('featured', '1')->paginate($this->paginate),
            'page' => 'buy'
        ]);
    }

    /**
     * Display properties for rent only
     */
    public function rent(){
        return view("properties")->with([
            'properties' => Property::where("for", "rent")->paginate($this->paginate),
            'page' => 'rent'
        ]);
    }


    /********************* END READ METHODS (USER) *********************
    *************************************************************
    *************************************************
    *************************************/




    /********************* START READ METHODS (ADMIN) *********************/

    public function getProperties(){
        return view("admin.properties")->with([
            'properties' => Property::paginate($this->paginate)
        ]);
    }

    public function getProperty($id){
        return view("admin.property")->with([
            'property' => Property::find($id)
        ]);
    }
    /********************* END READ METHODS (ADMIN) *********************
     *************************************************************
     *************************************************
     *************************************/


    public function createAdmin(){
        return view('admin.newProperty')->with([
            'types' => Type::all(),
            'customers' => Customer::all(),
        ]);
    }


    /**
     * Show the form for creating a new Property.
     */
    public function create()
    {
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(AddPropertyRequest $request)
    {
        $validated = $request->validated();
        $property = Property::create([
            'size' => $request->size,
            'title' => $request->title,
            'description' => $request->description,
            'featured' => 0,
            'price' => $request->price,
            'location' => $request->location,
            'bedrooms_nb' => $request->bedrooms,
            'bathrooms_nb' => $request->bathrooms,
            'date_posted' => Date::now(),
            'admin_id' => Auth::guard('admin')->id(),
            'type_id' => $request->type,
            'for' => $request->for,
            'customer_id' => $request->owner
        ]);

        if($request->hasFile('images')){
            foreach($request->file('images') as $file){
                $path = $file->store('public' . $request->owner);
                $img = Image::create([
                    'image' => $path
                ]);
                $property->images()->attach($property->id, ['image' => $img->id]);
            }
        }


    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        return view("admin.editProperty")->with([
            'property' => Property::find($id),
            'types' => Type::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'fname' => 'max:255',
            'mname' => '',
            'lname' => '',
            'email' => '',
            'phone' => ''
        ]);

        $property = Property::find($id);
        $property->customer_id = DB::table('customer')
                                    ->select("id")
                                    ->where('full_name', $request->ownerfname)
                                    ->get()[0]->id;
        $property->title = $request->title;
        $property->size = $request->size;
        $property->price = $request->price;
        dd($request->featured);
        $property->featured = $request->featured;
        $property->bedrooms_nb = $request->bedrooms;
        $property->bathrooms_nb = $request->bathrooms;
        $property->type_id = $request->type;

        if($property->isDirty()){
            $property->save();
            return redirect()->back()->with([
                'success_msg' => $property->title . " Updated Successfully",
            ]);
        }

        return redirect()->back()->with([
            'error_msg' => 'Nothing to Update!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        dd($id);
        Property::destroy($id);
        return redirect()->back()->with([
            'success_msg' => 'Property ' . $id . ' Deleted Successfully'
        ]);
    }
}
