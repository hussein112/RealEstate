<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display all the branches for the admin along with the developer email for requestion a new branch.
     *
     */
    public function adminIndex(){
        return view("admin.branches")->with([
            'branches' => Branch::all()
        ]);
    }
}
