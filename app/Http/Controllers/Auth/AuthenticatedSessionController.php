<?php

namespace App\Http\Controllers\Auth;

use App\Custom\getAuthRedirectUrl;
use App\Custom\getGuard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{

    use getAuthRedirectUrl, getGuard;

    /**
     * We set the middleware to restrict access to this controller or its methods.
     * It is important we defined all the different types of guests in the controller.
     * This way, if one type of user is logged in and you try to use another user type to log in, it will redirect you to the user dashboard.
     */
    public function __construct(){
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:employee')->except('logout');
    }

    /**
     * Display the login view.
     */
    public function create(): View
    {
        $guard = $this->getGuard();
        if(! empty($guard) && $guard != 'web'){
            return view($guard . '.auth.' . '.login');
        }
        // User Login
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $guard = $this->getGuard();
        $request->authenticate($guard);

        $request->session()->regenerate();

        return redirect()->intended($this->getAuthRedirectUrl($guard));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request, String $guard = 'web'): RedirectResponse
    {
        Auth::guard($guard)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect($this->getLogoutRedirectUrl($guard));
    }
}
