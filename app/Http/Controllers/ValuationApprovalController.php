<?php

namespace App\Http\Controllers;

use App\Events\ValuationAssignedEvent;
use App\Mail\ValuationApprovedEmail;
use App\Mail\ValuationRejectedEmail;
use App\Models\Assign;
use App\Models\Employee;
use App\Models\Valuation;
use App\Models\ValuationApproval;
use App\Notifications\NewValuation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class ValuationApprovalController extends Controller
{

    /**
     * View Valuation Notification
     *
     * @param $id
     * @param $notification_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index($id, $notification_id = null){
        $valuation = Valuation::findOrFail($id);
        if(isset($notification_id)){
            auth()->user()->notifications()->findOrFail($notification_id)->markAsRead();
        }
        return view("admin.requestValuation")->with([
            'valuation' => $valuation,
            'approval_status' => ValuationApproval::where('valuation_id', $valuation->id)->get()
        ]);
    }

    /**
     * Approve a pending Valuation
     */
    public function approve($id){
        // Approve Valuation
        $this->markAsApproved($id);

        // Assign to an Employee
        return view("admin.assignValuation")->with([
            'employees' => Employee::all(),
            'valuation' => Valuation::findOrFail($id)
        ]);

    }


    /**
     * Mark the valuation as approved
     */
    public function markAsApproved($id){
        ValuationApproval::where("valuation_id", $id)->update(['status' => 2]);
    }

    /**
     * Assign valuation to an employee
     *
     * @param $valuationId
     * @param $employeeId
     */
    public function assign($valuationId, $employeeId){
        $valuation = Valuation::findOrFail($valuationId);

        Assign::create([
            'employee_id' => $employeeId,
            'valuation_id' => $valuationId,
            'admin_id' => auth()->user()->id
        ]);

        $to = [
            [
                'email' => $valuation->issuer_email,
                'name' => $valuation->full_name
            ]
        ];

        Mail::to($to)->send(new ValuationApprovedEmail($valuation));

        $valuation->status = 0;
        $valuation->due_date = Carbon::now()->addDays(7);
        $valuation->save();


        // Notify Employee
        $employee = Employee::findOrFail($employeeId);
        event (new ValuationAssignedEvent($valuation, $employee));

        return view("admin.assignValuation")->with([
            'valuation' => $valuation,
            'sucess_msg' => "Valuation Assigned To Employee",
            'employee' => $employee
        ]);
    }

    /**
     * Reject a pending Valuation
     *
     * @param $id Valuation ID
     */
    public function reject($id){
        $valuation = Valuation::findOrFail($id);

        $pendingValuation = ValuationApproval::where("valuation_id", $id)->first();

        $pendingValuation->status = 0;
        $pendingValuation->save();

        $to = [
            [
                'email' => $valuation->issuer_email,
                'name' => $valuation->full_name
            ]
        ];

        // Send email to the user
        Mail::to($to)->send(new ValuationRejectedEmail($valuation));

        // Delete The Valuatoin
        Valuation::destroy($id);

        return redirect(route('a-valuations'));
    }

}
