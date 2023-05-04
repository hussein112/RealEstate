<?php

namespace App\Http\Controllers;

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

    // MAX ALLOWED enquiry for an employee/day
    public $EMPLOYEE_CAPACITY = 10;

    /**
     * Select an employee from the available ones
     *
     * @return mixed
     */
    public function getEmployee(){
        $available_employees = $this->getAllAvailableEmployees();
        if(sizeof($available_employees) > 0){
            return Arr::Random($available_employees);
        }
        return null;
    }


    public function getAllAvailableEmployees(){
        $employees_capacity = [
//            'id' => 'nb_of_tasks'
        ];

        $employees = Employee::all();

        foreach($employees as $employee){
            $employees_capacity[$employee->id] = Enquiry::where('employee_id', $employee->id)->count();
        }


        $available_employees = [];
        foreach($employees_capacity as $id => $capacity){
            if($capacity < $this->EMPLOYEE_CAPACITY){
                array_push($available_employees, $id);
            }
        }

        return $available_employees;
    }

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
}
