<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\Vaccine;
use App\Models\VaccineBatch;
use App\Models\VaccinePatient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Exception;

class VaccinePatientController extends Controller
{
    public function index_vaccine(Request $request) {
        if($request->ajax()){
            $data = Vaccine::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        return actionDetail(route('patient.vaccine_patient.index_centre', $data->id));
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('patient.vaccine_patient.index_vaccine');
    }

    public function index_centre(Request $request, $vaccine_id) {
        if($request->ajax()){
            $data = VaccineBatch::where('vaccine_id', $vaccine_id)->with(['healthcare_centre', 'vaccine'])->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('vaccine', function($data){
                        return $data->vaccine->name;
                    })
                    ->addColumn('name', function($data){
                        return $data->healthcare_centre->name;
                    })
                    ->addColumn('address', function($data){
                        return $data->healthcare_centre->address;
                    })
                    ->addColumn('date', function($data){
                        return format_date($data->start_date) . ' - ' . format_date($data->end_date);
                    })
                    ->addColumn('action', function($data){
                        return actionCreate(route('patient.vaccine_patient.form_create', $data->id));
                    })
                    ->rawColumns(['action', 'name', 'address', 'vaccine', 'date'])
                    ->make(true);
        }
        return view('patient.vaccine_patient.index_centre');
    }

    public function index(Request $request) {
        if($request->ajax()){
            $data = VaccinePatient::where('patient_id', auth()->guard('patient')->user()->id)->get();
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
                        return actionPatient('VaccinePatient #'. $data->name, route('patient.vaccine_patient.index'), route('patient.vaccine_patient.show', $data->id), route('patient.vaccine_patient.destroy', $data->id));
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        // $data_vaccine_batch = VaccineBatch::all();
        // $data_patient = Patient::all();
        return view('patient.vaccine_patient.index');
    }

    public function create($vaccine_batch_id){
        $data_vaccine_batch = VaccineBatch::where('id', $vaccine_batch_id)->first();
        $data_patient = Patient::where('id', auth()->guard('patient')->user()->id)->first();
        return view('patient.vaccine_patient.create', compact('data_vaccine_batch', 'data_patient'));
    }

    public function store(Request $request) {
        $request->validate(
            [
                'vaccine_batch_id' => 'required',
                'patient_id' => 'required',
                'vaccine_date' => 'required',
                // 'status' => 'required',
                'note' => 'required',
            ], [],
            [
                'vaccine_batch_id' => 'Healthcare Centre',
                'patient_id' => 'Patient',
                'vaccine_date' => 'Vaccine Date',
                // 'status' => 'Status',
                'note' => 'Note',
            ]);

        DB::beginTransaction();
        try{
            $request['status'] = 'pending';
            $vaccinePatient = VaccinePatient::create($request->all());
            DB::commit();
            return redirect()->back()->with('result', ['success', 'Data #'.$vaccinePatient->id.' Added Successfully.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => $ex->getMessage()]);
        }
    }

    public function show(VaccinePatient $vaccinePatient) {
        return view('patient.vaccine_patient.show', ['data' => $vaccinePatient]);
    }

    public function edit(VaccinePatient $vaccinePatient) {
        $data_vaccine_batch = VaccineBatch::all();
        $data_patient = Patient::all();
        return view('patient.vaccine_patient.edit', ['data' => $vaccinePatient, 'data_vaccine_batch' => $data_vaccine_batch, 'data_patient' => $data_patient]);
    }

    public function update(Request $request, VaccinePatient $vaccinePatient) {
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
            $vaccinePatient->update($request->all());
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
