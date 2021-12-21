<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\DB;

class LoginSetupController extends Controller
{
    use AuthenticatesUsers;

    // public function __construct()
    // {
    //     $this->middleware('guest:admin,healthcare_staff,patient')->except('logout');
    // }

    public function form_login_admin() {
        $login_as = 'admin';
        return view('auth.pages.login_admin', compact('login_as'));
    }

    public function login_admin(Request $request) {
        if($request->login_as == 'admin'){
            if (auth()->guard('admin')->attempt($request->only('username', 'password'))) {
                    return redirect()->route('admin.admin.index');
            } else {
                return redirect()->back()->withInput()->with('error', 'Login failed, please try again!');
            }
        }
        return redirect()->back()->withInput()->with('error', 'Login failed, User not found!');
    }

    public function form_login_healthcare_staff() {
        $login_as = 'healthcare_staff';
        return view('auth.pages.login_healthcare_staff', compact('login_as'));
    }

    public function login_healthcare_staff(Request $request) {
        if($request->login_as == 'healthcare_staff'){
            if (auth()->guard('healthcare_staff')->attempt($request->only('username', 'password'))) {
                    return redirect()->route('healthcare_staff.healthcare_staff.index');
            } else {
                return redirect()->back()->withInput()->with('error', 'Login failed, please try again!');
            }
        }
        return redirect()->back()->withInput()->with('error', 'Login failed, User not found!');
    }

    public function form_login_patient() {
        $login_as = 'patient';
        return view('auth.pages.login_patient', compact('login_as'));
    }

    public function login_patient(Request $request) {
        if($request->login_as == 'patient'){
            if (auth()->guard('patient')->attempt($request->only('username', 'password'))) {
                    return redirect()->route('patient.patient.index');
            } else {
                return redirect()->back()->withInput()->with('error', 'Login failed, please try again!');
            }
        }
        return redirect()->back()->withInput()->with('error', 'Login failed, User not found!');
    }

    public function logout() {
        $guards = array_keys(config('auth.guards'));
        foreach ($guards as $guard) {
            if(auth()->guard($guard)->check()) {
                auth()->guard($guard)->logout();
            }
        }
        return view('home.index');
    }
}
