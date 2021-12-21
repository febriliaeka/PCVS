<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HealthcareCentre;
use App\Models\HealthcareStaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Exception;

class HealthcareStaffController extends Controller
{
    public function index(Request $request) {
        if($request->ajax()){
            $data = HealthcareStaff::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        return actionBtn('HealthcareStaff #'. $data->name, route('admin.healthcare_staff.index'), route('admin.healthcare_staff.show', $data->id), route('admin.healthcare_staff.edit', $data->id), route('admin.healthcare_staff.destroy', $data->id));
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $data_healthcare_centre = HealthcareCentre::all();
        return view('admin.healthcare_staff.index', compact('data_healthcare_centre'));
        // return redirect()->route('admin.healthcare_staff.show', auth()->guard('healthcare_staff')->user()->id);
    }

    public function create(){
        return view('admin.healthcare_staff.create');
    }

    public function store(Request $request) {
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
                // 'myimg' =>'required|mimes:jpeg,png|max:2048',
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
                // 'myimg' => 'Image',
            ]);

        DB::beginTransaction();
        try{
            // if ($request->hasFile('myimg')) {
            //     $img_name = insertImg('upload/healthcare_staff/healthcare_staff/');
            //     $request['img'] = $img_name;
            // }
            $healthcareStaff = HealthcareStaff::create($request->all());
            DB::commit();
            return redirect()->back()->with('result', ['success', 'Data #'.$healthcareStaff->name.' Added Successfully.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => $ex->getMessage()]);
        }
    }

    public function show(HealthcareStaff $healthcareStaff) {
        return view('admin.healthcare_staff.show', ['data' => $healthcareStaff]);
    }

    public function edit(HealthcareStaff $healthcareStaff) {
        $data_healthcare_centre = HealthcareCentre::all();
        return view('admin.healthcare_staff.edit', ['data' => $healthcareStaff, 'data_healthcare_centre' => $data_healthcare_centre]);
    }

    public function update(Request $request, HealthcareStaff $healthcareStaff) {
        $request->validate(
            [
                'username' => 'required|unique:healthcare_staff,username,' . $healthcareStaff->id,
                'healthcare_centre_id' => 'required',
                'staff_id' => 'required|unique:healthcare_staff,staff_id,' . $healthcareStaff->id,
                'name' => 'required|unique:healthcare_staff,name,' . $healthcareStaff->id,
                'email' => 'required|unique:healthcare_staff,email,' . $healthcareStaff->id,
                'address' => 'required',
                'phone_number' => 'required|unique:healthcare_staff,phone_number,' . $healthcareStaff->id,
                // 'myimg' =>'nullable|mimes:jpeg,png|max:2048',
            ], [],
            [
                'username' => 'Username',
                'healthcare_centre_id' => 'Healthcare Centre',
                'staff_id' => 'Staff ID',
                'name' => 'Name',
                'email' => 'Email',
                'address' => 'Address',
                'phone_number' => 'Phone Number',
                // 'myimg' => 'Image',
            ]);
            if($request->password || $request->password_confirmation){
                $request->validate(
                    [
                        'password' => 'required|confirmed',
                        'password_confirmation' => 'required',
                    ], [],
                    [
                        'password' => 'Password',
                        'password_confirmation' => 'Confirm Password',
                    ]);
            }

        DB::beginTransaction();
        try{
            // if ($request->hasFile('myimg')) {
            //     $request['img'] = updateImg('upload/healthcare_staff/healthcare_staff/', $healthcareStaff->img);
            // }
            if($request->password && $request->password_confirmation){
                $healthcareStaff->update($request->all());
            }else{
                $healthcareStaff->update($request->except(['password']));
            }
            DB::commit();
            return redirect()->back()->with('result', ['success', 'Data #'.$healthcareStaff->name.' Updated Successfully.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => 'Error Occur.']);
        }
    }

    public function destroy(Request $request, HealthcareStaff $healthcareStaff) {
        DB::beginTransaction();
        try {
            // deleteImg('upload/healthcare_staff/healthcare_staff/', $healthcareStaff->img);
            $healthcareStaff->delete();
            DB::commit();
            $result = 'Data #'.$healthcareStaff->name.' Deleted Successfully.';
            $request->session()->flash('result', ['success', $result]);
            return response()->json(['status' => 1, 'text' => $result]);
        }catch(Exception $ex){
            DB::rollBack();
            return response()->json(['status' => 0, 'text' => 'Error Occur.']);
        }
    }
}
