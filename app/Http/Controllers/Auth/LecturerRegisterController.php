<?php

namespace App\Http\Controllers\Auth;

use App\Lecturer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LecturerRegisterController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest:lecturer');
    }

    public function showRegistrationForm()
    {
        return view('auth.lecturer-register');
    }

    public function register(Request $request)
    {
        // Validate form data
        $this->validate($request,
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:lecturers'],
                'password' => ['required', 'string', 'min:8']
            ]
        );

        // Create lecturer user
        try {
            $lecturer = Lecturer::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Log the lecturer in
            Auth::guard('lecturer')->loginUsingId($lecturer->id);
            return redirect()->route('lecturer.dashboard');
        } catch (\Exception $e) {
            return redirect()->back()->withInput($request->only('name', 'email'));
        }
    }
}
