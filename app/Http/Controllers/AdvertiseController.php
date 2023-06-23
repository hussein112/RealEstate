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
use App\Notifications\AssignedAdvertise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdvertiseController extends Controller
{
    use EmployeeCapacity;

    /**
     * Render the Advertise view.
     */
    public function index(){
        return view("properties.advertise")->with([
            'fors' => Property::select('for')->get(),
            'wheres' => Property::select('city')->get(),
            'types' => Type::all(),
        ]);
    }


    /**
     * Display all the advertisements on the system [Employees]
     *
     */
    public function employeeIndex(){
        return view("employee.advertisements")->with([
            'advertisements' => Advertise::where("employee_id", Auth::guard("employee")->id())
                ->where("status", "<>", "3")
                ->where("status", "<>", "2")
                ->get()
        ]);
    }


    /**
     * Display all the advertisements on the system [Admins]
     */
    public function adminIndex(){
        return view("admin.advertisements")->with([
            'advertisements' => Advertise::where("status", "<>", "3")
                ->where("status", "<>", "2")
                ->get()
        ]);
    }

    /**
     * Store a new advertisement.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Notify the admin when an advertisement cannot be assigned to any of the employees.
     *
     * @param $advertisement
     * @return void
     */
    public function notifyAdmin($advertisement){
        event (new UnassignedAdvertisementEvent($advertisement));
    }


    /**
     * Assign the given advertise to the given employee.
     *
     * @param $advertise
     * @param $employeeId
     * @return void
     */
    public function assign($advertise, $employeeId){
        $advertise->employee_id = $employeeId;
        $advertise->save();

        $employee = Employee::findOrFail($employeeId);
        event(new AdvertiseAssignedEvent($employee, $advertise));
    }


    /**
     * Display the specified unassigned advertisement.
     *
     * @param $advertisementId
     * @param $notification_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showUnassigned($advertisementId, $notification_id){
        if(isset($notification_id)){
            auth()->user()->notifications()->findOrFail($notification_id)->markAsRead();
        }
        return view('admin.assignAdvertise')->with([
            'employees' => Employee::all(),
            'advertisement' => Advertise::findOrFail($advertisementId)
        ]);
    }

    /**
     * Assign the given advertisement to the given employee even if the latter is at full capacity
     *
     * @param $advertiseId
     * @param $employeeId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function assignByForce($advertiseId, $employeeId){
        $advertisement = Advertise::findOrFail($advertiseId);

        $advertisement->employee_id = $employeeId;
        $advertisement->save();

        $employee = Employee::findOrFail($employeeId);

        event(new AssignedAdvertise($advertisement));

        return view("admin.assignAdvertise")->with([
            'advertisement' => $advertisement,
            'sucess_msg' => "Advertisenent Assigned To Employee",
            'employee' => $employee
        ]);
    }

    /**
     * Show the specified advertisement. [Employees]
     * it could be from a notification.
     *
     * @param $id
     * @param $notificationId
     */
    public function employeeShow($id, $notificationId = null){
        if(isset($notificationId)){
            auth()->user()->notifications()->findOrFail($notificationId)->markAsRead();
        }
        return view("employee.advertisement")->with([
            'advertisement' => Advertise::findOrFail($id)
        ]);
    }

    /**
     * Show the specified advertisement. [Admins]
     * it could be from a notification.
     * @param $id
     * @param $notificationId
     */
    public function adminShow($id, $notificationId = null){
        if(isset($notificationId)){
            auth()->user()->notifications()->findOrFail($notificationId)->markAsRead();
        }
        return view("admin.advertisement")->with([
            'advertisement' => Advertise::findOrFail($id)
        ]);
    }


    /**
     * Approve a pending advertisement request.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
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


    /**
     * Reject a pending advertisement request.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Mark an advertisement as done
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function done($id){
        $advertisement = Advertise::findOrFail($id);
        $advertisement->status = 3;
        $advertisement->save();

        return redirect()->back()->with([
            'success_msg' => "Advertisement Marked as Done."
        ]);
    }
}
