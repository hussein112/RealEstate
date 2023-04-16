<?php

namespace App\Http\Controllers;

use App\Mail\ValuationApprovedEmail;
use App\Models\Valuation;
use App\Models\ValuationApproval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ValuationApprovalController extends Controller
{
    public function index($id, $notification_id = null){
        $valuation = Valuation::findOrFail($id);
        if(isset($notification_id)){
            auth()->user()->notifications()->findOrFail($notification_id)->markAsRead();
        }
        return view("admin.requestValuation")->with([
            'valuation' => $valuation
        ]);
    }

    /**
     * Approve a pending Valuation
     *
     * @param $id Valuation ID
     * @return void
     */
    public function approve($id){
        $pendingValuation = ValuationApproval::where("valuation_id", $id)->first();

        $pendingValuation->status = 2;
        $pendingValuation->save();

        // Send email to the user



        return redirect(route('a-valuations'));
    }


    /**
     * Reject a pending Valuation
     *
     * @param $id Valuation ID
     * @return void
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
        Mail::to($to)->send(new ValuationApprovedEmail($valuation));

        // Delete The Valuatoin
        Valuation::destroy($id);

        return redirect(route('a-valuations'));
    }

}
