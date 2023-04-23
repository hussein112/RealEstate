<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\Property;
use Illuminate\Http\Request;

class EnquiriesController extends Controller
{
    public function adminIndex(){
        return view("admin.enquiries")->with([
            'enquiries' => Enquiry::sortable()->paginate(9)
        ]);
    }

    public function employeeIndex(){
        return view("employee.enquiries")->with([
            'enquiries' => Enquiry::sortable()->where('employee_id', auth()->user()->id)->where('status', 0)->get()
        ]);
    }

    public function adminShow($id){
        return view("admin.enquiry")->with([
            'enquiry' => Enquiry::find($id),
        ]);
    }

    public function employeeShow($id, $notificationId = null){
        if(isset($notificationId)){
            auth()->user()->notifications()->findOrFail($notificationId)->markAsRead();
        }
        return view('employee.enquiry')->with([
            'enquiry' => Enquiry::findOrFail($id)
        ]);
    }


    public function markAsDone($id){
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->status = 1;
        $enquiry->employee_id = null;
        $enquiry->save();
        return redirect()->back()->with([
            'success_msg' => "Enquiry Marked As Done"
        ]);
    }


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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     */
    public function update(Request $request, $id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->status = 1;
        $enquiry->save();

        return redirect()->back()->with([
            'success_msg' => "Enquiry Marked As Done"
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
