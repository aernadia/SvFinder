<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupervisorLoginController extends Controller
{
    //ADD GUEST SUPERVISOR SO THAT ONLY LOGGED OUT VISITOR CAN HAVE ACCESS
    public function __construct()
    {
        $this->middleware('guest:supervisor')->except('logout');
    }
    
    public function showLoginForm()
    {
        return view('auth.supervisor-login');
    }

    public function login(Request $request)
    {
        // Validate form data
        $this->validate($request,
            [
                'email' => 'required|string|email',
                'password' => 'required|string|min:8'
            ]
        );

        // Attempt to login as supervisor
        if (Auth::guard('supervisor')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // If successful then redirect to intended route or supervisor dashboard
            return redirect()->intended(route('supervisor.dashboard'));
        }

        // If unsuccessful then redirect back to login page with email and remember fields
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    //logout method
    public function logout(Request $request)
    {
        Auth::guard('supervisor')->logout();
        return redirect('/');
    }
}
