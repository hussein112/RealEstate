<?php

namespace App\Http\Controllers;

use App\Custom\MaxFeaturesPerProperty;
use App\Http\Requests\AddPropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Advertise;
use App\Models\Customer;
use App\Models\Feature;
use App\Models\Image;
use App\Models\Property;
use App\Models\Type;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;

class PropertyController extends Controller
{

    protected int $paginate = 12;

    protected int $SIMILARTIY_RANGE = 200;

    /**
     * Display all Properties [Users]
     */
    public function index()
    {
        return view("properties")->with([
            'properties' => Property::paginate($this->paginate),
            'page' => 'all'
        ]);
    }


    /**
     * Display all Featured Properties [Users]
     */
    public function featured(){
        return view('properties')->with([
            'properties' => Property::where('featured', '1')->paginate($this->paginate),
            'page' => 'featured'
        ]);
    }

    /**
     * Display the specified Property. [Users]
     * @param  int  $id
     */
    public function show($id)
    {
        $property = Property::findOrFail($id);
        $similar = Property::where('id', '<>', $id)
            ->where(function ($query) use ($property) {
                $query->where('address', 'LIKE', '%' . $property->address . '%')
                    ->orWhere('size', 'BETWEEN', [$property->size - $this->SIMILARTIY_RANGE, $property->size + $this->SIMILARTIY_RANGE])
                    ->orWhere('price', 'BETWEEN', [$property->price - $this->SIMILARTIY_RANGE, $property->price + $this->SIMILARTIY_RANGE])
                    ->orWhere('city', $property->city);
            })
            ->get();
        return view('property')->with([
            'property' => $property,
            'similar_properties' => $similar
        ]);
    }

    /**
     * Display properties for buy only [Users]
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
     * Display properties for rent only [Users]
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
     * Fill a form in order to add the customer property on the website [User]
     */
    public function sell(){
        return view("properties.advertise")->with([
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all(),
            'page' => 'sell'
        ]);
    }


    /**
     * Display all the properties [Employees]
     */
    public function employeeIndex(){
        return view("employee.properties")->with([
            'properties' => Property::paginate($this->paginate)
        ]);
    }

    /**
     * Display the from for creating new property [Employees]
     */
    public function employeeCreate(){
        return view("employee.newProperty")->with([
            'types' => Type::all(),
            'customers' => Customer::all(),
            'features' => Feature::all(),
        ]);
    }


    /**
     * Display the form to edit existing property [Employees]
     * @param $id
     */
    public function employeeEdit($id){
        return view("employee.editProperty")->with([
            'property' => Property::find($id),
            'types' => Type::all(),
            'customers' => Customer::all(),
            'features' => Feature::all(),
        ]);
    }


    /**
     * Display all the properties [Admins]
     */
    public function adminIndex(){
        return view("admin.properties")->with([
            'properties' => Property::paginate($this->paginate)
        ]);
    }

    /**
     * Display the form for creating new property [Admins]
    */
    public function createAdmin(){
        return view('admin.newProperty')->with([
            'types' => Type::all(),
            'customers' => Customer::all(),
            'features' => Feature::all()
        ]);
    }


    /**
     * Display the form for editing an existing property [Admins]
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
            'customer_id' => $request->owner,
            'until' => ($request->until) ?? NULL
        ]);

        if($request->hasFile('images.image')){
            foreach($request->file('images.image.*') as $file){
                $img = Image::create([
                    'image' => $file->store('property/' . $property->id, 'public')
                ]);
                $property->images()->attach($property->id, ['image_id' => $img->id]);
            }
        }
        if($request->get('hk-csv')){
            $features = explode(',', $request->get('hk-csv'));
            if(sizeof($features) > MaxFeaturesPerProperty::getMax()){
                return redirect()->back()->with('features_error', 'Features should be no more than ' . MaxFeaturesPerProperty::getMax());
            }
            for($i = 0; $i < sizeof($features); $i++){
                $feature = trim($features[$i]);
                if(strlen($feature) > 2){ // Avoid small texts i.e., 'hi'
                    if(Feature::where('feature', $feature)->exists()){
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
     * Update the specified property.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(UpdatePropertyRequest $request, $id)
    {
        $validated = $request->validated();

        $property = Property::findOrFail($id);
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
        $property->until = ($request->until) ?? NULL;

        if(isset($request->hks)){
            $features = explode(',', $request->hks);
            for($i = 0; $i < sizeof($features); $i++){
                $feature = trim($features[$i]);
                if(strlen($feature) > 2){ # Extra validation for nonsense features. (e.g., hi)
                    if(Feature::where('feature', $feature)->exists()){
                        if($property->features()->where('feature', $features)->exists()){
                            return redirect()->back()->with("info_msg", "Nothing to Update!");
                        }
                        $property->features()->attach($property->id, ['feature_id' => Feature::where('feature', $feature)->first()->id]);
                    }else{
                        $newF = Feature::create([
                            'feature' => $feature
                        ]);
                        $property->features()->attach($property->id, ['feature_id' => $newF->id]);
                    }
                }
            }
        }

        if($property->isDirty()){
            $property->save();
            return redirect()->back()->with([
                'success_msg' => $property->title . " Updated Successfully",
            ]);
        }

        return redirect()->back()->with('info_msg', 'Nothing to Update!');
    }


    /**
     * Update the property image.
     * Remove the old image, insert new one.
     * @param Request $request
     * @param int $imageId
     * @param int $propertyId
     */
    public function updateImage(Request $request, int $propertyId, int $imageId){
        Image::destroy($imageId);
        $property = Property::findOrFail($propertyId);
        if($request->hasFile('image')) {
            $img = Image::create([
                'image' => $request->file('image')->store('property/' . $property->id, 'public')
            ]);
            $property->images()->attach($property->id, ['image_id' => $img->id]);
            $property->save();
            session()->put("success_msg", "Image Updated Successfully");
            return json_encode(["Done"]);
        }
        return json_encode(["Something Went Wrong"]);

    }

    /**
     * Insert new image to alread existing property. (i.e., From the edit page).
     * @param Request $request
     * @param int $imageId
     * @param int $propertyId
     */
    public function insertImage(Request $request, int $propertyId){
        $property = Property::findOrFail($propertyId);
        if($request->hasFile('image')) {
            $img = Image::create([
                'image' => $request->file('image')->store('property/' . $property->id, 'public')
            ]);
            $property->images()->attach($property->id, ['image_id' => $img->id]);
            $property->save();
            session()->put("success_msg", "Image Updated Successfully");
            return json_encode(["Done"]);
        }
        return json_encode(["Something Went Wrong"]);
    }

    /**
     * Remove the specified property from DB.
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



    /**
     * *************************************
     * ********* SEARCH LOGIC
     * ************************************
     */

    /**
     * By City
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




    /**
     * General Search
     * @param Request $request
     */
    public function search(Request $request){
        if($request->minprice == -1 && $request->maxprice == -1 && $request->minbedrooms == 0 && $request->maxbedrooms == 0){
            $search_results = Property::query()
                                ->where('for', 'LIKE', '%'.$request->dealtype.'%')
                                ->orWhere('city', 'LIKE', '%'. $request->location .'%')
                                ->paginate($this->paginate);
        }else{
            $search_results = Property::query()
                ->where('for', 'LIKE', '%'.$request->dealtype.'%')
                ->orWhere('city', 'LIKE', '%'. $request->location .'%')
                ->orWhere('type_id', 'LIKE', '%'. $request->propertyType .'%')
                ->orWhere('bedrooms_nb', '>', '%'. $request->minbedrooms .'%')
                ->orWhere('bedrooms_nb', '<', '%'. $request->maxbedrooms .'%')
                ->orWhere('price', '>', '%'. $request->minprice .'%')
                ->orWhere('price', '<', '%'. $request->maxprice .'%')
                ->paginate($this->paginate);
        }
        return view("properties")->with([
            'properties' => $search_results,
            'page' => 'all',
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all(),
        ]);
    }
}
