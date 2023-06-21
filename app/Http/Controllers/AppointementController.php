<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddAppointementRequest;
use App\Http\Requests\UpdateAppointementRequest;
use App\Models\Appointement;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AppointementController extends Controller
{
    /**
     * Display all the appointments an admin have created
     *
     */
    public function adminIndex(){
        return view('admin.appointements')->with([
            'appointements' => Appointement::where('admin_id', Auth::guard("admin")->id())->sortable()->paginate(9)
        ]);
    }

    /**
     * Display the specified appointment [Admins]
     * @param $id
     */
    public function adminShow($id){
        return view("admin.appointement")->with([
            'appointement' => Appointement::find($id)
        ]);
    }


    /**
     * Show the form for creating a new appointment [Admins].
     */
    public function create()
    {
        return view("admin.newAppointement")->with([
            'properties' => Property::all()
        ]);
    }



    /**
     * Display the form for editing an existing appointement.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        return view("admin.editAppointement")->with([
            'appointement' => Appointement::findOrFail($id),
            'properties' => Property::all()
        ]);
    }

    /**
     * Display all the appointments an employee have created
     *
     */
    public function employeeIndex(){
        return view("employee.appointements")->with([
            'appointements' => Appointement::where('employee_id', Auth::guard("employee")->id())->sortable()->paginate(9)
        ]);
    }

    /**
     * Display the form for editing an existing appointment
     * @param $id
     */
    public function employeeEdit($id){
        return view("employee.editAppointement")->with([
            'appointement' => Appointement::findOrFail($id),
            'properties' => Property::all()
        ]);
    }

    /**
     * Display the form for creating new appointment [Employees]
     */
    public function employeeCreate(){
        return view("employee.newAppointement")->with([
            'properties' => Property::all()
        ]);
    }

    /**
     * Store a newly created appointment in DB.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(AddAppointementRequest $request)
    {
        $validated = $request->validated();

        $appointement = Appointement::create([
            'title' => $request->title,
            'notes' => $request->notes,
            'property_id' => $request->property,
            'employee_id' => Auth::guard("employee")->id() ?? NULL,
            'admin_id' => auth()->user()->id
        ]);

        return redirect()->back()->with('success_msg', "Appointment Added Successfully.");
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(UpdateAppointementRequest $request, $id)
    {
        $validate = $request->validated();

        $appointement = Appointement::findOrFail($id);
        $appointement->title = $request->title;
        $appointement->notes = $request->notes;
        $appointement->property_id = $request->property;

        if($appointement->isDirty()){
            $appointement->save();
            return redirect()->back()->with([
                'success_msg' => $appointement->title . " Updated Successfully",
            ]);
        }

        return redirect()->back()->with([
            'error_msg' => 'Nothing to Update!'
        ]);
    }

    /**
     * Remove the specified appointment from DB.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        Appointement::destroy($id);
        return redirect()->back()->with('success_msg', 'Appointment ' . $id . ' Deleted Successfully.');
    }
}
