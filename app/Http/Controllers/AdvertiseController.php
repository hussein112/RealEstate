<?php

namespace App\Http\Controllers;

use App\Custom\EmployeeCapacity;
use App\Events\AdvertiseAssignedEvent;
use App\Events\UnassignedAdvertisementEvent;
use App\Mail\AdvertisementApprovedEmail;
use App\Mail\AdvertisementRejectedEmail;
use App\Models\Advertise;
use App\Models\Employee;
use App\Models\Property;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdvertiseController extends Controller
{
    use EmployeeCapacity;

    public function index(){
        return view("advertise")->with([
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all(),
        ]);
    }


    public function employeeIndex(){
        return view("employee.advertisements")->with([
            'advertisements' => Advertise::where("employee_id", Auth::guard("employee")->id())
                ->where("status", "<>", "3")
                ->where("status", "<>", "2")
                ->get()
        ]);
    }


    public function adminIndex(){
        return view("admin.advertisements")->with([
            'advertisements' => Advertise::where("status", "<>", "3")
                ->where("status", "<>", "2")
                ->get()
        ]);
    }

    public function store(Request $request){
        $request->validate([

        ]);

        $advertise = Advertise::create([
            'full_name' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'type_id' => $request->type,
            'location' => $request->location,
            'for' => $request->for,
            'message' => $request->message,
            'status' => 0
        ]);

        $employee_available = $this->getEmployee();

        if(isset($employee_available)){
            $this->assign($advertise, $employee_available);
        }else{
            $this->notifyAdmin($advertise);
        }

        return redirect()->back()->with([
            'surccess_msg' => "Wait an email from us"
        ]);
    }

    public function notifyAdmin($advertisement){
        event (new UnassignedAdvertisementEvent($advertisement));
    }


    public function assign($advertise, $employeeId){
        $advertise->employee_id = $employeeId;
        $advertise->save();

        $employee = Employee::findOrFail($employeeId);
        event(new AdvertiseAssignedEvent($employee, $advertise));
    }


    public function employeeShow($id, $notificationId = null){
        if(isset($notificationId)){
            auth()->user()->notifications()->findOrFail($notificationId)->markAsRead();
        }
        return view("employee.advertisement")->with([
            'advertisement' => Advertise::findOrFail($id)
        ]);
    }


    public function adminShow($id, $notificationId = null){
        if(isset($notificationId)){
            auth()->user()->notifications()->findOrFail($notificationId)->markAsRead();
        }
        return view("admin.advertisement")->with([
            'advertisement' => Advertise::findOrFail($id)
        ]);
    }



    public function approve($id){
        $advertisement = Advertise::findOrFail($id);
        $advertisement->status = 1;
        $advertisement->save();

        $to = [
            [
                'email' => $advertisement->email,
                'name' => $advertisement->full_name
            ]
        ];

        Mail::to($to)->send(new AdvertisementApprovedEmail($advertisement));

        return redirect()->back()->with([
            'success_msg' => "Advertisement Approved"
        ]);
    }


    public function reject($id){
        $advertisement = Advertise::findOrFail($id);
        $advertisement->status = 2;
        $advertisement->save();

        $to = [
            [
                'email' => $advertisement->email,
                'name' => $advertisement->full_name
            ]
        ];

        Mail::to($to)->send(new AdvertisementRejectedEmail($advertisement));

        return redirect()->back()->with([
            'success_msg' => "Advertisement Rejected"
        ]);
    }


    public function done($id){
        $advertisement = Advertise::findOrFail($id);
        $advertisement->status = 3;
        $advertisement->save();

        return redirect()->back()->with([
            'success_msg' => "Advertisement Marked as Done"
        ]);
    }
}
