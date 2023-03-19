<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPropertyRequest;
use App\Models\Customer;
use App\Models\Feature;
use App\Models\Image;
use App\Models\Property;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

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


    public function employeeIndex(){
        return view("employee.properties")->with([
            'properties' => Property::paginate($this->paginate)
        ]);
    }

    public function employeeProperty($id){
        return view("employee.property")->with([
            'property' => Property::findOrFail($id)
        ]);
    }

    public function employeeCreate(){
        return view("employee.newProperty")->with([
            'types' => Type::all(),
            'customers' => Customer::all(),
            'features' => Feature::all(),
        ]);
    }


    /********************* START READ METHODS (ADMIN) *********************/

    public function adminIndex(){
        return view("admin.properties")->with([
            'properties' => Property::paginate($this->paginate)
        ]);
    }

    public function adminProperty($id){
        return view("admin.property")->with([
            'property' => Property::find($id)
        ]);
    }

    public function search(Request $request){
        return view("properties")->with([
//            'properties' => Property::paginate($this->paginate), Search query
//            'search_results' => Property::query()
//                                        ->where('name', 'LIKE', $request->test)
//                                        ->orWhere('')
//                                        ->get(),
            'page' => 'all'
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
            'features' => Feature::all(),
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
            'featured' => ($request->has('featured') ? $request->featured : 0),
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

        if($request->hasFile('images.image')){
            foreach($request->file('images.image.*') as $file){
                $img = Image::create([
                    'image' => $file->store('property/' . $property->id, 'public')
                ]);
                $property->images()->attach($property->id, ['image_id' => $img->id]);
            }
        }

        if(isset($request->hks)){
            $features = explode(',', $request->hks);
            foreach($features as $feature){
                if(strlen($feature) > 2){
                    $old = Feature::where('feature', $feature)->first();
                    if($old == null){
                        $newF = Feature::create([
                            'feature' => trim($feature)
                        ]);
                        $property->features()->attach($property->id, ['feature_id' => $newF->id]);
                    }else{
                        $property->features()->attach($property->id, ['feature_id' => $old->id]);
                    }
                }
            }
        }

        return redirect()->back()->with(['success_msg' => 'Property Inserted Successfully']);
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
            'size' => ['numeric', 'max_digits:4'],
            'title' => ['max:300', 'regex:/[\s\Wa-zA-z0-9]/'],
            'description' => ['max:450', 'regex:/[\s\Wa-zA-z0-9]/'],
            'price' => ['numeric', 'max_digits:6'],
            'location' => ['regex:/[\s\Wa-zA-z0-9]/', 'max:120'],
            'bedrooms' => ['numeric', 'max_digits:2'],
            'bathrooms' => ['numeric', 'max_digits:2'],
            'type' => ['numeric', 'max_digits:1'],
            'for' => ['string', 'max:20'],
            'owner' => ['numeric', 'max_digits:4'],
            // 1024 -> 1MB
//            'images' => ['image', 'mimes:jpeg,png,jpg', 'size:1024', 'dimensions:min_width=200,max_width=1000,min_height=100,max_height=100']
            'images.image.*' => 'image'
        ]);

        $property = Property::find($id);
        $property->customer_id = DB::table('customer')
                                    ->select("id")
                                    ->where('full_name', $request->ownerfname)
                                    ->get()[0]->id;
        $property->title = $request->title;
        $property->size = $request->size;
        $property->price = $request->price;
        $property->featured = ($request->featured) ?? 0;
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
        Property::destroy($id);
        return redirect()->back()->with([
            'success_msg' => 'Property ' . $id . ' Deleted Successfully'
        ]);
    }
}
