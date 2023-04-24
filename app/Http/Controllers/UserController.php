<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Models\Image;
use App\Models\Property;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function employeeIndex(){
        return view("employee.users")->with([
            'users' => User::paginate(9)
        ]);
    }
    public function adminIndex(){
        return view("admin.users")->with([
            'users' => User::all()
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function adminCreate(){
        return view("admin.newUser");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Http\Requests\AddUserRequest  $request
     */
    public function store(Request $request)
    {
        $request->validate([

        ]);

        if($request->hasFile('avatar')){
            $img = Image::create([
                'image' => $request->file('avatar')->store('avatars/users', 'public')
            ]);
        }

        $user = User::create([
            'f_name' => $request->fname,
            'm_name' => $request->mname,
            'l_name' => $request->lname,
            'password' => $request->password,
            'phone' => $request->phone,
            'email' => $request->email,
            'avatar_id' => ($img->id) ?? 1, // 1 -> Default.jpg
            'admin_id' => (Auth::guard('admin')->id()) ?? NULL,
        ]);

        Auth::login($user);

        return redirect()->intended()->with(['success_msg' => 'User Added Successfully']);
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

    public function adminEdit($id){
        return view("admin.editUser")->with([
            'user' => User::findOrFail($id)
        ]);
    }

    public function employeeEdit($id){
        return view("employee.editUser")->with([
            'user' => User::findOrFail($id)
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
            'phone' => '',
            'avatar' => ''
        ]);

        $img = Image::create([
            'image' => $request->file('avatar')->store('avatars/users', 'public')
        ]);

        $user = User::find($id);
        $user->f_name = $request->fname;
        $user->m_name = $request->mname;
        $user->l_name = $request->lname;
//        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->avatar_id = $img->id;


        if($user->isDirty()){
            $user->save();
            return redirect()->back()->with([
                'success_msg' => $user->f_name . ' ' . $user->l_name . " Updated Successfully",
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
        User::destroy($id);
        return redirect()->back()->with([
            'success_msg' => 'User ' . $id . ' Deleted Successfully'
        ]);
    }
}
