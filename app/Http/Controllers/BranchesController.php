<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    public function adminIndex(){
        return view("admin.branches")->with([
            'branches' => Branch::all()
        ]);
    }
}
