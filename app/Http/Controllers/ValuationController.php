<?php

namespace App\Http\Controllers;

use App\Events\NewValuationRequest;
use App\Models\Admin;
use App\Models\Property;
use App\Models\Type;
use App\Models\Valuation;
use App\Models\ValuationApproval;
use App\Notifications\ValuationRequested;
use Illuminate\Http\Request;
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
            'valuations' => Valuation::join('assign', 'valuation.id', '=', 'assign.valuation_id')
                                    ->select('valuation.*')
                                    ->where('valuation.status', 0)
                                    ->get()
        ]);
    }

    public function adminShow($id){
        return view('admin.valuation')->with([
            'valuation' => Valuation::find($id)
        ]);
    }

    /**
     * Display Only the Assigned Valuations
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function employeeShow($id, $notificationId = null){
        if(isset($notificationId)){
            auth()->user()->notifications()->findOrFail($notificationId)->markAsRead();
        }
        return view('employee.valuation')->with([
            'valuation' => Valuation::findOrFail($id)
        ]);
    }

    public function adminEdit($id){
        return view("admin.editValuation")->with([
            'valuation' => Valuation::findOrFail($id)
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
//        event (new NewValuationRequest($valuation));
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
     * Mark Valuation as Done.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update($id)
    {
         $valuation = Valuation::findOrFail($id);
         $valuation->status = 1;
         $valuation->save();

         return redirect()->back()->with([
             'success_msg' => "Valuation Marked As Done"
         ]);
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
