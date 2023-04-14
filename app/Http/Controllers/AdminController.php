<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Appointement;
use App\Models\Image;
use App\Models\Property;
use App\Models\User;
use App\Models\Valuation;
use App\Custom\DateQueries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
                ['date_issued', '<', now()],
                ['date_issued', '>', $this->pastWeek()]
            ])->count(),
            'appointement' => Appointement::all()->count(),
            'latest_appointement' => Appointement::where([
                ['date', '<', now()],
                ['date', '>', $this->pastWeek()]
            ])->count(),
//            'enquiries' => Enquiry::all()->count(),

            'properties' => Property::all()->count(),
            'latest_properties' => Property::where([
                ['date_posted', '<', now()],
                ['date_posted', '>', $this->pastWeek()]
            ])->count(),

            'users' => User::all()->count(),
            'latest_users' => User::where([
                ['joined_at', '<', now()],
                ['joined_at', '>', $this->pastWeek()]
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fname' => ['required'],
            'mname' => ['required'],
            'lname' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'image' => ['']
        ]);
        if($request->hasFile('image')){
            $path = $request->file('image')->store('avatars/admin', 'public');
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
        return view("admin.profile")->with([
            'admin' => Admin::find($id)
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

        $admin = Admin::find($id);
        $admin->f_name = $request->fname;
        $admin->m_name = $request->mname;
        $admin->l_name = $request->lname;
//        $admin->password = Hash::make($request->password);
        $admin->email = $request->email;
        $admin->phone = $request->phone;

        if(isset($request->avatar)){
            $img = Image::create([
                'image' => $request->file('avatar')->store('avatars/admin', 'public')
            ]);
        }

        $admin->avatar_id = ($img->id) ?? $admin->avatar_id;

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
