<?php

namespace App\Http\Controllers;

use App\Models\Valuation;
use Illuminate\Http\Request;

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

}
