<?php

namespace App\Http\Controllers;

use App\Models\Appointement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AppointementController extends Controller
{
    public function adminIndex(){
        return view('admin.appointements')->with([
            'appointements' => Appointement::sortable()->paginate(9)
        ]);
    }

    public function employeeIndex(){
        return view("employee.appointements")->with([
            'appointements' => Appointement::where('employee_id', Auth::guard("employee")->id())->sortable()->paginate(9)
        ]);
    }

    public function adminShow($id){
        return view("admin.appointement")->with([
            'appointement' => Appointement::find($id)
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
     */
    public function create()
    {
        return view("employee.newAppointement");
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        Appointement::destroy($id);
        return redirect()->back()->with([
            'success_msg' => 'Appointement ' . $id . ' Deleted Successfully'
        ]);
    }
}
