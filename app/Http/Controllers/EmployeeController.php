<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function adminIndex(){
        return view("admin.employees")->with([
            'employees' => Employee::all()
        ]);
    }

    public function adminEdit($id){
        return view('admin.editEmployee')->with([
            'employee' => Employee::find($id)
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
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'fname' => 'max:255',
            'mname' => '',
            'lname' => '',
            'email' => '',
            'phone' => ''
        ]);

        $employee = Employee::find($id);
        $employee->full_name = $request->fullname;
//        $admin->password = Hash::make($request->password);
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->statement = $request->stmt;

        if($employee->isDirty()){
            $employee->save();
            return redirect()->back()->with([
                'success_msg' => $employee->full_name . " Updated Successfully",
            ]);
        }

        return redirect()->back()->with([
            'error_msg' => 'Nothing to Update!'
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
