<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use App\Models\Appointement;
use App\Models\Enquiry;
use App\Models\Image;
use App\Models\Property;
use App\Models\User;
use App\Models\Valuation;
use App\Custom\DateQueries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    use DateQueries;

    protected int $paginate = 12;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.dashboard")->with([
            'valuations' => Valuation::all()->count(),
            'latest_valuations' => Valuation::where([
                ['created_at', '<', now()],
                ['created_at', '>', $this->pastWeek()]
            ])->count(),
            'appointements' => Appointement::all()->count(),
            'latest_appointements' => Appointement::where([
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

    public function admins(){
        return view("admin.admins")->with([
            'admins' => Admin::paginate($this->paginate)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view("admin.newAdmin");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(AddAdminRequest $request)
    {
        $validated = $request->validated();

        if($request->hasFile('avatar')){
            $path = $request->file('avatar')->store('avatars/admin', 'public');
            $img = Image::create([
                'image' => $path
            ]);
        }
        Admin::create([
            'f_name' => $request->fname,
            'm_name' => $request->mname,
            'l_name' => $request->lname,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'email' => $request->email,
            'avatar_id' => $img->id
        ]);



        return redirect()->back()->with([
            'success_msg' => $request->fname . ' ' . $request->lname . " Added Successfully",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        return view("admin.profile")->with([
            'admin' => Admin::find($id)
        ]);
    }


    public function updatePassword(Request $request, $id){
        $admin = Admin::find($id);
        $request->validate([
            'old' => 'required',
            'new' => ['required', Password::min(10)->mixedCase()->numbers()]
        ]);

        if(!Hash::check($request->old, $admin->password)){
            return back()->with("error_msg", "Old Password Doesn't match!");
        }

        User::whereId($admin->id)->update([
            'password' => Hash::make($request->new)
        ]);

        return back()->with("success_msg", "Password Updated Succesfully");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, $id)
    {
        $validated = $request->validated();

        $admin = Admin::find($id);
        $admin->f_name = $request->fname;
        $admin->m_name = $request->mname;
        $admin->l_name = $request->lname;
        $admin->email = $request->email;
        $admin->phone = $request->phone;

        if(request()->hasFile('avatar')){
            $img = Image::create([
                'image' => $request->file('avatar')->store('avatars/admin', 'public')
            ]);
            $admin->avatar_id = $img->id;
        }

        if($admin->isDirty()){
            $admin->save();
            return redirect()->back()->with([
                'success_msg' => $admin->f_name . ' ' . $admin->l_name . " Updated Successfully",
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
        Admin::destroy($id);
        return redirect()->back()->with([
            'success_msg' => 'Admin ' . $id . ' Deleted Successfully'
        ]);
    }

    public function deleteNotifications(){
        auth()->user()->notifications()->delete();
        return redirect()->back();
    }

    public function readNotifications(){
        auth()->user()->unreadNotifications()->markAsRead();
        return redirect()->back();
    }

}
