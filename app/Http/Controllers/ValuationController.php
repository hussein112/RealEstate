<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Property;
use App\Models\Type;
use App\Models\Valuation;
use App\Models\ValuationApproval;
use Illuminate\Http\Request;
use App\Notifications\ValuationRequested;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Notification;

class ValuationController extends Controller
{
    public function adminIndex(){
        return view('admin.valuations')->with([
            // Sort According to approval status
            'valuations' => Valuation::sortable()->paginate(9),
            'approval_status' => ValuationApproval::all()
        ]);
    }

    public function employeeIndex(){
        return view("employee.valuations")->with([
            'valuations' => Valuation::sortable()->paginate(9)
        ]);
    }

    public function adminShow($id){
        return view('admin.valuation')->with([
            'valuation' => Valuation::find($id)
        ]);
    }

    public function adminEdit($id){
        return view("admin.editValuation")->with([
            'valuation' => Valuation::find($id)
        ]);
    }
    /**
     * Display all the valuations
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new valuation.
     */
    public function create()
    {
        return view("newValuation")->with([
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'addressone' => ['required'],
            'addresstwo' => ['required'],
            'state' => ['required'],
            'postalcode' => ['required'],
            'city' => ['required'],
            'bedrooms' => ['required'],
            'bathrooms' => ['required'],
            'type' => ['required'],
            'description' => ['required'],
        ]);



        $valuation = Valuation::create([
            'full_name' => $request->fullname,
            'date_issued' => Date::now(),
            'issuer_email' => $request->email,
            'issuer_phone' => $request->phone,
            'address_one' => $request->addressone,
            'address_two' => $request->addresstwo,
            'state' => $request->state,
            'city' => $request->city,
            'postal_code' => $request->postalcode,
            'furnishing_status' => $request->furnishing,
            'garage' => ($request->garage == 'on') ? 1 : 0,
            'bedrooms_nb' => $request->bedrooms,
            'bathrooms_nb' => $request->bathrooms,
            'for' => $request->for,
            'type' => $request->type,
            'description' => $request->description,
            'valuation_status' => 0,
            'due_date' => null,
        ]);

        $admins = Admin::all();
        // Insert into pending table
        ValuationApproval::create([
            'status' => 1,
            'valuation_id' => $valuation->id,
            'admin_id' => null
        ]);
        Notification::send($admins, new ValuationRequested($valuation));
        return redirect()->back()->with([
            'success_msg' => 'Valuation Added Successfully, Wait an email from us.'
        ]);
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
