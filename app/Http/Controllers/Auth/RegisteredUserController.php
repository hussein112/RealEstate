<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, $guard)
    {
        $validated = $request->validate([
            'fname' => [],
            'mname' => [],
            'lname' => [],
            'email' => [],
            'phone' => [],
            'password' => []
        ]);

        if ($request->hasFile('avatar')) {
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
            'avatar_id' => ($img->id) ?? 'default.jpg',
            'admin_id' => (Auth::guard('admin')->id()) ?? NULL,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
