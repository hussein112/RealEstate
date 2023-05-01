<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Enquiry;
use App\Models\Property;
use App\Notifications\AssignedEnquiry;
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
     */
    public function review($enquiry_id, $notification_id)
    {
        if(isset($notification_id)){
            auth()->user()->notifications()->findOrFail($notification_id)->markAsRead();
        }
        return view('admin.assignEnquiry')->with([
            'employees' => Employee::all(),
            'enquiry' => Enquiry::findOrFail($enquiry_id)
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
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->status = 1;
        $enquiry->save();

        return redirect()->back()->with([
            'success_msg' => "Enquiry Marked As Done"
        ]);
    }

    /**
     * @param $enquiryId
     * @param $employeeId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * $valuation = Valuation::findOrFail($id);
    if(isset($notification_id)){
    auth()->user()->notifications()->findOrFail($notification_id)->markAsRead();
    }
     *
     */

    public function assign($enquiryId, $employeeId){
        $enquiry = Enquiry::findOrFail($enquiryId);


        $enquiry->employee_id = $employeeId;
        $enquiry->save();


        // Notify Employee
        $employee = Employee::findOrFail($employeeId);
        $employee->notify(new AssignedEnquiry($enquiry));

        return view("admin.assignEnquiry")->with([
            'enquiry' => $enquiry,
            'sucess_msg' => "Enquiry Assigned To Employee",
            'employee' => $employee
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
