<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\FavoriteList;
use App\Models\Image;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function employeeIndex(){
        return view("employee.users")->with([
            'users' => User::paginate(9)
        ]);
    }
    public function adminIndex(){
        return view("admin.users")->with([
            'users' => User::paginate(9)
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("userProfile")->with([
            'user' => User::find(auth()->user()->id),
            'favorites' => FavoriteList::where("user_id", auth()->user()->id)->get()
        ]);
    }

    public function adminCreate(){
        return view("admin.newUser");
    }

    public function employeeCreate(){
        return view("employee.newUser");
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
    public function store(AddUserRequest $request)
    {
        $validated = $request->validated();

        if(request()->hasFile('avatar')){
            $img = Image::create([
                'image' => request()->file('avatar')->store('avatars/users', 'public')
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
            'employee_id' => (Auth::guard('employee')->id()) ?? NULL,
        ]);

        Auth::login($user);

        // Send "Email Verification" Email
        event(new Registered($user));
        return view('auth.verify-email');
    }


    /**
     * Super Users -> Admins + employees
     */
    public function superUsersStore(Request $request){
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
            'employee_id' => (Auth::guard('employee')->id()) ?? NULL,
        ]);

        return back()->with([
            'success_msg' => "User Added Successfully"
        ]);
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
    public function update(UpdateUserRequest $request, $id)
    {
        $validate = $request->validated();

        $user = User::find($id);
        $user->f_name = $request->fname;
        $user->m_name = $request->mname;
        $user->l_name = $request->lname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if(request()->hasFile('avatar')){
            $img = Image::create([
                'image' => $request->file('avatar')->store('avatars/users', 'public')
            ]);
            $user->avatar_id = $img->id;
        }

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


    public function updatePassword(Request $request, $id){
        $request->validate([
            'old' => 'required',
            'new' => ['required', Password::min(10)->mixedCase()->numbers()]
        ]);

        if(!Hash::check($request->old, auth()->user()->password)){
            return back()->with("error_msg", "Old Password Doesn't match!");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new)
        ]);

        return back()->with("success_msg", "Password Updated Succesfully");
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
