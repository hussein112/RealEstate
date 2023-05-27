<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
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
            'property' => Property::findOrFail($id)
        ]);
    }

    /**
     * Display properties for buy only
     */
    public function buy(){
        return view("properties")->with([
            'properties' => Property::where('featured', '1')->paginate($this->paginate),
            'page' => 'buy',
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all(),
        ]);
    }

    /**
     * Display properties for rent only
     */
    public function rent(){
        return view("properties")->with([
            'properties' => Property::where("for", "rent")->paginate($this->paginate),
            'page' => 'rent',
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all(),
        ]);
    }

    /**
     * Fill a form in order to add the customer property on the website
     *
     */
    public function sell(){
        return view("properties.advertise")->with([
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all(),
            'page' => 'sell'
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
            'property' => Property::findOrFail($id),
            'features' => Feature::all()
        ]);
    }

    public function employeeCreate(){
        return view("employee.newProperty")->with([
            'types' => Type::all(),
            'customers' => Customer::all(),
            'features' => Feature::all(),
        ]);
    }


    public function employeeEdit($id){
        return view("employee.editProperty")->with([
            'property' => Property::find($id),
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


    /**
     * City
     */
    public function searchByLocation($city){
        $search_results = Property::query()
            ->where('city', 'LIKE', '%'. $city .'%')
            ->paginate(10);
        return view("properties")->with([
            'properties' => $search_results,
            'page' => 'all',
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all(),
        ]);
    }

    public function searchByPrice($price){
        $search_results = Property::query()
            ->where('price', 'LIKE', '%'. $price .'%')
            ->paginate(10);
        return view("properties")->with([
            'properties' => $search_results,
            'page' => 'all',
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all(),
        ]);
    }



    public function searchByBedroomsNumber($nb){
        $search_results = Property::query()
            ->where('bedrooms_nb', $nb)
            ->paginate(10);

        return view("properties")->with([
            'properties' => $search_results,
            'page' => 'all',
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all(),
        ]);
    }


    public function search(Request $request){
        if($request->minprice == -1 && $request->maxprice == -1 && $request->minbedrooms == 0 && $request->maxbedrooms == 0){
            $search_results = Property::query()
                                ->where('for', 'LIKE', '%'.$request->dealtype.'%')
                                ->orWhere('city', 'LIKE', '%'. $request->location .'%')
                                ->paginate(10);
        }else{
            $search_results = Property::query()
                ->where('for', 'LIKE', '%'.$request->dealtype.'%')
                ->orWhere('city', 'LIKE', '%'. $request->location .'%')
                ->orWhere('type_id', 'LIKE', '%'. $request->propertyType .'%')
                ->orWhere('bedrooms_nb', '>', '%'. $request->minbedrooms .'%')
                ->orWhere('bedrooms_nb', '<', '%'. $request->maxbedrooms .'%')
                ->orWhere('price', '>', '%'. $request->minprice .'%')
                ->orWhere('price', '<', '%'. $request->maxprice .'%')
                ->paginate(10);
        }
        return view("properties")->with([
            'properties' => $search_results,
            'page' => 'all',
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all(),
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
            'features' => Feature::all()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(AddPropertyRequest $request)
    {
        $validated = $request->validated();
        // Extra Validation
        if($request->for !== "rent" && $request->for !== "buy"){
            return redirect()->back()->with('error_msg', "Invalid 'for' input");
        }
        $for = ($request->for == "rent") ? 1 : 2;
        $property = Property::create([
            'size' => $request->size,
            'title' => $request->title,
            'description' => $request->description,
            'featured' => ($request->has('featured') ? $request->featured : 0),
            'price' => $request->price,
            'city' => $request->city,
            'address' => $request->address,
            'bedrooms_nb' => $request->bedrooms,
            'bathrooms_nb' => $request->bathrooms,
            'employee_id' => (Auth::guard('employee')->id()) ?? null,
            'admin_id' => (Auth::guard('admin')->id()) ?? null,
            'type_id' => $request->type,
            'for' => $for,
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
            for($i = 0; $i <= 2; $i++){
                $feature = trim($features[$i]);
                if(strlen($feature) > 2){
                    if(Feature::where('feature', $feature)->exists()){
                        echo "<h1>" . $feature . ", " . $property->title . "</h1>";
                        $property->features()->attach($property->id, ['feature_id' => Feature::where('feature', $feature)->first()->id]);
                    }else{
                        $newF = Feature::create([
                            'feature' => $feature
                        ]);
                        $property->features()->attach($property->id, ['feature_id' => $newF->id]);
                    }
                }
            }
            foreach($features as $feature){
                $feature = trim($feature);

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
            'types' => Type::all(),
            'customers' => Customer::all(),
            'features' => Feature::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(UpdatePropertyRequest $request, $id)
    {
        $validated = $request->validated();

        $property = Property::findOrFail($id);
        $property->customer_id = DB::table('customer')
                                    ->select("id")
                                    ->where('full_name', $request->ownerfname)
                                    ->get()[0]->id;
        $property->title = $request->title;
        $property->size = $request->size;
        $property->customer_id = $request->owner;
        $property->price = $request->price;
        $property->featured = ($request->featured) ?? 0;
        $property->city = ($request->featured) ?? 0;
        $property->address = ($request->featured) ?? 0;
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
