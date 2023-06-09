<?php

namespace App\Http\Controllers;

use App\Events\NewValuationRequest;
use App\Events\ValuationRequestedEvent;
use App\Http\Requests\AddValuationRequest;
use App\Models\Admin;
use App\Models\Property;
use App\Models\Type;
use App\Models\Valuation;
use App\Models\ValuationApproval;
use App\Notifications\ValuationRequested;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Notification;

class ValuationController extends Controller
{
    public function adminIndex(){
        return view('admin.valuations')->with([
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
            'valuation' => Valuation::find($id),
            'approval_status' => ValuationApproval::where('valuation_id', $id)->get()
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
    public function store(AddValuationRequest $request)
    {
        $validated = $request->validated();

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
        event (new ValuationRequestedEvent($valuation, Auth::guard('admin')->user()));
        return redirect()->back()->with([
            'success_msg' => 'Valuation Added Successfully, Wait an email from us.'
        ]);
    }


    /**
     * Mark Valuation as Done.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function done($id)
    {
         $valuation = Valuation::findOrFail($id);
         $valuation->status = 1;
         $valuation->save();

         return redirect()->back()->with([
             'success_msg' => "Valuation Marked As Done"
         ]);
    }
}
