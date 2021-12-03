<?php

namespace App\Http\Controllers\HealthcareStaff;

use App\Http\Controllers\Controller;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Exception;

class PatientController extends Controller
{
    public function index(Request $request) {
        if($request->ajax()){
            $data = Patient::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        return actionBtn('Patient #'. $data->name, route('healthcare_staff.patient.index'), route('healthcare_staff.patient.show', $data->id), route('healthcare_staff.patient.edit', $data->id), route('healthcare_staff.patient.destroy', $data->id));
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('healthcare_staff.patient.index');
    }

    public function create(){
        return view('healthcare_staff.patient.create');
    }

    public function store(Request $request) {
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
            return redirect()->back()->with('result', ['success', 'Data #'.$patient->name.' Added Successfully.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => $ex->getMessage()]);
        }
    }

    public function show(Patient $patient) {
        return view('healthcare_staff.patient.show', ['data' => $patient]);
    }

    public function edit(Patient $patient) {
        return view('healthcare_staff.patient.edit', ['data' => $patient]);
    }

    public function update(Request $request, Patient $patient) {
        $request->validate(
            [
                'username' => 'required|unique:patients,username,' . $patient->id,
                'ic_passport' => 'required|unique:patients,ic_passport,' . $patient->id,
                'name' => 'required|unique:patients,name,' . $patient->id,
                'email' => 'required|unique:patients,email,' . $patient->id,
                'address' => 'required',
                'phone_number' => 'required|unique:patients,phone_number,' . $patient->id,
                'myimg' =>'nullable|mimes:jpeg,png,jpg|max:2048',
            ], [],
            [
                'username' => 'Username',
                'ic_passport' => 'Staff ID',
                'name' => 'Name',
                'email' => 'Email',
                'address' => 'Address',
                'phone_number' => 'Phone Number',
                'myimg' => 'Image',
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
            if ($request->hasFile('myimg')) {
                $request['img'] = updateImg('upload/patient/patient/', $patient->img);
            }
            if($request->password && $request->password_confirmation){
                $patient->update($request->all());
            }else{
                $patient->update($request->except(['password']));
            }
            DB::commit();
            return redirect()->back()->with('result', ['success', 'Data #'.$patient->name.' Updated Successfully.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => 'Error Occur.']);
        }
    }

    public function destroy(Request $request, Patient $patient) {
        DB::beginTransaction();
        try {
            deleteImg('upload/patient/patient/', $patient->img);
            $patient->delete();
            DB::commit();
            $result = 'Data #'.$patient->name.' Deleted Successfully.';
            $request->session()->flash('result', ['success', $result]);
            return response()->json(['status' => 1, 'text' => $result]);
        }catch(Exception $ex){
            DB::rollBack();
            return response()->json(['status' => 0, 'text' => 'Error Occur.']);
        }
    }
}
