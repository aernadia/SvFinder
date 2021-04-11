<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LecturerLoginController extends Controller
{
    //ADD GUEST LECTURER SO THAT ONLY LOGGED OUT VISITOR CAN HAVE ACCESS
    public function __construct()
    {
        $this->middleware('guest:lecturer')->except('logout');
    }
    
    public function showLoginForm()
    {
        return view('auth.lecturer-login');
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

        // Attempt to login as lecturer
        if (Auth::guard('lecturer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // If successful then redirect to intended route or lecturer dashboard
            return redirect()->intended(route('lecturer.dashboard'));
        }

        // If unsuccessful then redirect back to login page with email and remember fields
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    //logout method
    public function logout(Request $request)
    {
        Auth::guard('lecturer')->logout();
        return redirect('/');
    }
}
