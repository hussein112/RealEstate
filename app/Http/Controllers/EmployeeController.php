<?php

namespace App\Http\Controllers;

use App\Custom\DateQueries;
use App\Models\Appointement;
use App\Models\Employee;
use App\Models\Enquiry;
use App\Models\Image;
use App\Models\Property;
use App\Models\User;
use App\Models\Valuation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    use DateQueries;

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
     */
    public function index()
    {
        return view("employee.dashboard")->with([
            'valuations' => Valuation::all()->count(),
            'latest_valuations' => Valuation::where([
                ['created_at', '<', now()],
                ['created_at', '>', $this->pastWeek()]
            ])->count(),
            'appointement' => Appointement::all()->count(),
            'latest_appointement' => Appointement::where([
                ['created_at', '<', now()],
                ['created_at', '>', $this->pastWeek()]
            ])->count(),
            'enquiries' => Enquiry::all()->count(),
            'latest_enquiries' => Enquiry::where([
                ['created_at', '<', now()],
                ['created_at', '>', $this->pastWeek()]
            ])->count(),
            'properties' => Property::all()->count(),
            'latest_properties' => Property::where([
                ['created_at', '<', now()],
                ['created_at', '>', $this->pastWeek()]
            ])->count(),

            'users' => User::all()->count(),
            'latest_users' => User::where([
                ['created_at', '<', now()],
                ['created_at', '>', $this->pastWeek()]
            ])->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.newEmployee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'fullname' => [],
            'password' => [],
            'email' => [],
            'phone' => [],
            'stmt' => [],
            'avatar' => []
        ]);


        if($request->hasFile('avatar')){
            $img = Image::create([
                'image' => $request->file('avatar')->store('avatars/employee', 'public')
            ]);
        }


        Employee::create([
            'full_name' => $request->fullname,
            'statement' => $request->stmt,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'admin_id' => Auth::guard('admin')->id(),
            'avatar_id' => ($img->id) ?? 'default.jpg'
        ]);

        return redirect()->back()->with([
            'success_msg' => $request->fullname . " Added Successfully",
        ]);
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
     */
    public function edit($id)
    {
        return view("employee.editProfile")->with([
            'employee' => Employee::findOrFail($id)
        ]);
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
     */
    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect()->back()->with([
            'success_msg' => 'Layout ' . $id . ' Deleted Successfully'
        ]);
    }
}
