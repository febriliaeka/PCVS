<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\VaccineBatch;
use App\Models\VaccinePatient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Exception;

class VaccinePatientController extends Controller
{
    public function index(Request $request) {
        if($request->ajax()){
            $data = VaccinePatient::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('vaccine_batch_id', function($data){
                        return $data->vaccine_batch->code;
                    })
                    ->editColumn('patient_id', function($data){
                        return $data->patient->name;
                    })
                    ->editColumn('vaccine_date', function($data){
                        return format_date($data->vaccine_date);
                    })
                    ->editColumn('status', function($data){
                        return returnStatusVaccinePatient($data->status);
                    })
                    ->addColumn('action', function($data){
                        return actionBtn('VaccinePatient #'. $data->name, route('admin.vaccine_patient.index'), route('admin.vaccine_patient.show', $data->id), route('admin.vaccine_patient.edit', $data->id), route('admin.vaccine_patient.destroy', $data->id));
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $data_vaccine_batch = VaccineBatch::all();
        $data_patient = Patient::all();
        return view('admin.vaccine_patient.index', compact('data_vaccine_batch', 'data_patient'));
    }

    public function create(){
        return view('admin.vaccine_patient.create');
    }

    public function store(Request $request) {
        $request->validate(
            [
                'vaccine_batch_id' => 'required',
                'patient_id' => 'required',
                'vaccine_date' => 'required',
                'status' => 'required',
                'note' => 'required',
            ], [],
            [
                'vaccine_batch_id' => 'Healthcare Centre',
                'patient_id' => 'Patient',
                'vaccine_date' => 'Vaccine Date',
                'status' => 'Status',
                'note' => 'Note',
            ]);

        DB::beginTransaction();
        try{
            $vaccinePatient = VaccinePatient::create($request->all());
            DB::commit();
            return redirect()->back()->with('result', ['success', 'Data #'.$vaccinePatient->id.' Added Successfully.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => $ex->getMessage()]);
        }
    }

    public function show(VaccinePatient $vaccinePatient) {
        return view('admin.vaccine_patient.show', ['data' => $vaccinePatient]);
    }

    public function edit(VaccinePatient $vaccinePatient) {
        $data_vaccine_batch = VaccineBatch::all();
        $data_patient = Patient::all();
        return view('admin.vaccine_patient.edit', ['data' => $vaccinePatient, 'data_vaccine_batch' => $data_vaccine_batch, 'data_patient' => $data_patient]);
    }

    public function update(Request $request, VaccinePatient $vaccinePatient) {
        $request->validate(
            [
                // 'vaccine_batch_id' => 'required',
                // 'patient_id' => 'required',
                'vaccine_date' => 'required',
                'status' => 'required',
                'note' => 'required',
            ], [],
            [
                // 'vaccine_batch_id' => 'Healthcare Centre',
                // 'patient_id' => 'Patient',
                'vaccine_date' => 'Vaccine Date',
                'status' => 'Status',
                'note' => 'Note',
            ]);
            if($vaccinePatient->vaccine_batch->qty_available <= $vaccinePatient->vaccine_batch->qty_administered && $request->status == 'confirmed'){
                return redirect()->back()->with('result', ['error', 'Slot for vaccine batch is full.']);
            }
        DB::beginTransaction();
        try{
            $vaccinePatient->update($request->all());
            if($request->status == 'confirmed') {
                $vaccinePatient->vaccine_batch->increment('qty_administered');
            }
            DB::commit();
            return redirect()->back()->with('result', ['success', 'Data #'.$vaccinePatient->id.' Updated Successfully.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => 'Error Occur.']);
        }
    }

    public function destroy(Request $request, VaccinePatient $vaccinePatient) {
        DB::beginTransaction();
        try {
            $vaccinePatient->delete();
            DB::commit();
            $result = 'Data #'.$vaccinePatient->id.' Deleted Successfully.';
            $request->session()->flash('result', ['success', $result]);
            return response()->json(['status' => 1, 'text' => $result]);
        }catch(Exception $ex){
            DB::rollBack();
            return response()->json(['status' => 0, 'text' => 'Error Occur.']);
        }
    }
}
