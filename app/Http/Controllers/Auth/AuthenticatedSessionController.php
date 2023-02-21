<?php

namespace App\Http\Controllers\Auth;

use App\Custom\getAuthRedirectUrl;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{

    use getAuthRedirectUrl;

    /**
     * Display the login view.
     */
    public function create(String $guard = ""): View
    {
        if(! empty($guard)){
            return view($guard . '.auth.' . '.login');
        }
        // User Login
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request, String $guard = 'web')
    {
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

        return redirect($this->getAuthRedirectUrl($guard));
    }
}
