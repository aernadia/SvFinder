<?php

namespace App\Http\Controllers\Auth;

use App\Supervisor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SupervisorRegisterController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest:supervisor');
    }

    public function showRegistrationForm()
    {
        return view('auth.supervisor-register');
    }

    public function register(Request $request)
    {
        // Validate form data
        $this->validate($request,
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:supervisors'],
                'password' => ['required', 'string', 'min:8']
            ]
        );

        // Create supervisor user
        try {
            $supervisor = Supervisor::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Log the supervisor in
            Auth::guard('supervisor')->loginUsingId($supervisor->id);
            return redirect()->route('supervisor.dashboard');
        } catch (\Exception $e) {
            return redirect()->back()->withInput($request->only('name', 'email'));
        }
    }
}
