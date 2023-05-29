<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Models\Employee;
use Cassandra\Custom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function adminIndex(){
        return view("admin.customers")->with([
            'customers' => Customer::paginate(9)
        ]);
    }


    public function employeeIndex(){
        return view("employee.customers")->with([
            'customers' => Customer::paginate(9)
        ]);
    }

    public function adminCreate(){
        return view('admin.newCustomer');
    }

    public function employeeCreate(){
        return view("employee.newCustomer");
    }

    public function adminEdit($id){
        return view("admin.editCustomer")->with([
            'customer' => Customer::find($id)
        ]);
    }


    public function employeeEdit($id){
        return view("employee.editCustomer")->with([
            'customer' => Customer::find($id)
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(AddCustomerRequest $request)
    {
        $validated = $request->validated();

        Customer::create([
            'full_name' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'admin_id' => (Auth::guard('admin')->id()) ?? null,
            'employee_id' => (Auth::guard("employee")->id()) ?? null
        ]);

        return redirect()->back()->with([
            'success_msg' => "Customer " . $request->fullname . " Addedd Successfully."
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(UpdateCustomerRequest $request, $id)
    {
        $validated = $request->validated();

        $customer = Customer::find($id);
        $customer->full_name = $request->fullname;
        $customer->email = $request->email;
        $customer->phone = $request->phone;


        if($customer->isDirty()){
            $customer->save();
            return redirect()->back()->with([
                'success_msg' => $customer->full_name . '  Updated Successfully',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        Customer::destroy($id);
        return redirect()->back()->with([
            'success_msg' => 'Customer ' . $id . ' Deleted Successfully'
        ]);
    }
}
