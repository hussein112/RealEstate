<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class EnquiryController extends Controller
{
    /**
     * New Enquiry Requested
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request, $propertyId){
        /**
         * Store Enquiry
         * assign to an employee (automatically)
         * add status as in progress (0)
         * Notify Employee
         * give the employee the data for enquiry
         *
         * Employee
         *  mark the enquiry as done (1)
         */
        $enquiry = Enquiry::create([
            'date_issued' => Date::now(),
            'issuer_name' => $request->fullname,
            'issuer_email' => $request->email,
            'issuer_phone' => $request->phone,
            'issuer_message' => $request->message,
            'property_id' => $propertyId
        ]);

        $this->assign($enquiry);
    }

    /**
     * Assign to an employee Algorithm
     *
     * @param int $enquiryId
     * @param int $employeeId
     * @return void
     */
    public function assign($enquiryId){

    }
}
