<?php

namespace App\Http\Controllers;

use App\Custom\EmployeeCapacity;
use App\Events\AssignedEnquiryEvent;
use App\Events\EnquiryAssigned;
use App\Events\UnAssignedEnquiryEvent;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\Enquiry;
use App\Notifications\AssignedEnquiry;
use App\Notifications\UnassignedEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Notification;

class EnquiryController extends Controller
{
    use EmployeeCapacity;

    /**
     * Notify the admin for unassigned enquiries due to the fact that all employees are at full capacity.
     *
     * @param $enquiry
     * @return void
     */
    public function notifyAdmin($enquiry){
        event (new UnAssignedEnquiryEvent($enquiry));
    }

    /**
     * New Enquiry Requested
     *
     * @param Request $request
     */
    public function store(Request $request, $propertyId){
        /**
         * Employee
         *  mark the enquiry as done (1)
         */
        $enquiry = Enquiry::create([
            'issuer_name' => $request->fullname,
            'issuer_email' => $request->email,
            'issuer_phone' => $request->phone,
            'issuer_message' => $request->message,
            'property_id' => $propertyId
        ]);

        $employee_available = $this->getEmployee();

        if(isset($employee_available)){
            $this->assign($enquiry, $employee_available);
        }else{
            $this->notifyAdmin($enquiry);
        }

        return redirect()->back()->with([
            'success_msg' => 'Done, Wait an Email/Call from us!'
        ]);
    }

    /**
     * Assign to an employee Algorithm
     *
     * @param int $employeeId
     * @return void
     */
    public function assign($enquiry, $employeeId){
        $enquiry->employee_id = $employeeId;
        $enquiry->status = 0;
        $enquiry->save();
        $employee = Employee::findOrFail($employeeId);
        event (new AssignedEnquiryEvent($enquiry, $employee));
    }


    /**
     * Display all the enquiries on the system. [Admins]
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function adminIndex(){
        return view("admin.enquiries")->with([
            'enquiries' => Enquiry::sortable()->paginate(9)
        ]);
    }

    /**
     * Display all the enquiries on the system. [Employees]
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function employeeIndex(){
        return view("employee.enquiries")->with([
            'enquiries' => Enquiry::sortable()->where('employee_id', auth()->user()->id)->where('status', 0)->get()
        ]);
    }

    /**
     * Display the specified enquiry on the system. [Admins]
     *
     * @param $id
     */
    public function adminShow($id){
        return view("admin.enquiry")->with([
            'enquiry' => Enquiry::find($id),
        ]);
    }


    /**
     * Display all the specified enquiry on the system. [Employees]
     *
     * @param $id
     * @param $notificationId
     */
    public function employeeShow($id, $notificationId = null){
        if(isset($notificationId)){
            auth()->user()->notifications()->findOrFail($notificationId)->markAsRead();
        }
        return view('employee.enquiry')->with([
            'enquiry' => Enquiry::findOrFail($id)
        ]);
    }


    /**
     * Mark the valuation as done.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
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
     * Assign an enquiry to an employee By Force.
     *
     * @param $enquiryId
     * @param $employeeId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function assignByForce($enquiryId, $employeeId){
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
}
