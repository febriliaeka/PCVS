<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\HealthcareCentre;
use App\Models\HealthcareStaff;
use App\Models\Patient;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function form_register_admin(Request $request) {
        return view('auth.register.admin');
    }
    public function register_admin(Request $request) {
        $request->validate(
            [
                'username' => 'required|unique:admins,username',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
                'name' => 'required|unique:admins,name',
                'address' => 'required',
                'phone_number' => 'required|unique:admins,phone_number',
                'myimg' =>'required|mimes:jpeg,png,jpg|max:2048',
            ], [],
            [
                'username' => 'Username',
                'password' => 'Password',
                'password_confirmation' => 'Password Confirmation',
                'name' => 'Name',
                'address' => 'Address',
                'phone_number' => 'Phone Number',
                'myimg' => 'Image',
            ]);

        DB::beginTransaction();
        try{
            if ($request->hasFile('myimg')) {
                $img_name = insertImg('upload/admin/admin/');
                $request['img'] = $img_name;
            }
            $admin = Admin::create($request->all());
            DB::commit();
            return redirect()->route('auth.form_login_admin')->with('result', ['success', 'Register #'.$admin->name.' Success.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => $ex->getMessage()]);
        }
    }

    public function form_register_healthcare_staff(Request $request) {
        $data_healthcare_centre = HealthcareCentre::all();
        return view('auth.register.healthcare_staff', compact('data_healthcare_centre'));
    }

    public function register_healthcare_staff(Request $request) {
        $request->validate(
            [
                'username' => 'required|unique:healthcare_staff,username',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
                'healthcare_centre_id' => 'required',
                'staff_id' => 'required|unique:healthcare_staff,staff_id',
                'name' => 'required|unique:healthcare_staff,name',
                'email' => 'required|unique:healthcare_staff,email',
                'address' => 'required',
                'phone_number' => 'required|unique:healthcare_staff,phone_number',
                'myimg' =>'required|mimes:jpeg,png,jpg|max:2048',
            ], [],
            [
                'username' => 'Username',
                'password' => 'Password',
                'password_confirmation' => 'Password Confirmation',
                'healthcare_centre_id' => 'Healthcare Centre',
                'staff_id' => 'Staff ID',
                'name' => 'Name',
                'email' => 'Email',
                'address' => 'Address',
                'phone_number' => 'Phone Number',
                'myimg' => 'Image',
            ]);

        DB::beginTransaction();
        try{
            if ($request->hasFile('myimg')) {
                $img_name = insertImg('upload/healthcare_staff/healthcare_staff/');
                $request['img'] = $img_name;
            }
            $healthcareStaff = HealthcareStaff::create($request->all());
            DB::commit();
            return redirect()->route('auth.form_login_healthcare_staff')->with('result', ['success', 'Register #'.$healthcareStaff->name.' Success.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => $ex->getMessage()]);
        }
    }

    public function form_register_patient(Request $request) {
        return view('auth.register.patient');
    }

    public function register_patient(Request $request) {
        $request->validate(
            [
                'username' => 'required|unique:patients,username',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
                'ic_passport' => 'required|unique:patients,ic_passport',
                'name' => 'required|unique:patients,name',
                'email' => 'required|unique:patients,email',
                'address' => 'required',
                'phone_number' => 'required|unique:patients,phone_number',
                'myimg' =>'required|mimes:jpeg,png|max:2048',
            ], [],
            [
                'username' => 'Username',
                'password' => 'Password',
                'healthcare_centre_id' => 'Healthcare Centre',
                'ic_passport' => 'Staff ID',
                'name' => 'Name',
                'email' => 'Email',
                'address' => 'Address',
                'phone_number' => 'Phone Number',
                'myimg' => 'Image',
            ]);

        DB::beginTransaction();
        try{
            if ($request->hasFile('myimg')) {
                $img_name = insertImg('upload/patient/patient/');
                $request['img'] = $img_name;
            }
            $patient = Patient::create($request->all());
            DB::commit();
            return redirect()->route('auth.form_login_patient')->with('result', ['success', 'Register #'.$patient->name.' Success.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => $ex->getMessage()]);
        }
    }


}
