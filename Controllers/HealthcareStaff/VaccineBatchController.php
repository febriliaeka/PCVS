<?php

namespace App\Http\Controllers\HealthcareStaff;

use App\Http\Controllers\Controller;
use App\Models\HealthcareCentre;
use App\Models\Vaccine;
use App\Models\VaccineBatch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Exception;

class VaccineBatchController extends Controller
{
    public function index(Request $request) {
        if($request->ajax()){
            $data = VaccineBatch::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('healthcare_centre_id', function($data){
                        return $data->healthcare_centre->name;
                    })
                    ->editColumn('vaccine_id', function($data){
                        return $data->vaccine->name;
                    })
                    ->addColumn('date', function($data){
                        return format_date($data->start_date) . ' - ' . format_date($data->end_date);
                    })
                    ->addColumn('action', function($data){
                        return actionBtn('VaccineBatch #'. $data->name, route('healthcare_staff.vaccine_batch.index'), route('healthcare_staff.vaccine_batch.show', $data->id), route('healthcare_staff.vaccine_batch.edit', $data->id), route('healthcare_staff.vaccine_batch.destroy', $data->id));
                    })
                    ->rawColumns(['action', 'date'])
                    ->make(true);
        }
        $data_healthcare_centre = HealthcareCentre::all();
        $data_vaccine = Vaccine::all();
        return view('healthcare_staff.vaccine_batch.index', compact('data_healthcare_centre', 'data_vaccine'));
    }

    public function create(){
        return view('healthcare_staff.vaccine_batch.create');
    }

    public function store(Request $request) {
        $request->validate(
            [
                'vaccine_id' => 'required',
                'healthcare_centre_id' => 'required',
                'code' => 'required|unique:vaccine_batches,code',
                'start_date' => 'required',
                'end_date' => 'required',
                'qty_available' => 'required',
            ], [],
            [
                'vaccine_id' => 'Vaccine',
                'healthcare_centre_id' => 'Healthcare Centre',
                'code' => 'Code',
                'start_date' => 'Start Date',
                'end_date' => 'End Date',
                'qty_available' => 'Qty Available',
            ]);

        DB::beginTransaction();
        try{
            $vaccineBatch = VaccineBatch::create($request->all());
            DB::commit();
            return redirect()->back()->with('result', ['success', 'Data #'.$vaccineBatch->code.' Added Successfully.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => $ex->getMessage()]);
        }
    }

    public function show(VaccineBatch $vaccineBatch) {
        return view('healthcare_staff.vaccine_batch.show', ['data' => $vaccineBatch]);
    }

    public function edit(VaccineBatch $vaccineBatch) {
        $data_healthcare_centre = HealthcareCentre::all();
        $data_vaccine = Vaccine::all();
        return view('healthcare_staff.vaccine_batch.edit', ['data' => $vaccineBatch, 'data_healthcare_centre' => $data_healthcare_centre, 'data_vaccine' => $data_vaccine]);
    }

    public function update(Request $request, VaccineBatch $vaccineBatch) {
        $request->validate(
            [
                'vaccine_id' => 'required',
                'healthcare_centre_id' => 'required',
                'code' => 'required|unique:vaccine_batches,code,' . $vaccineBatch->id,
                'start_date' => 'required',
                'end_date' => 'required',
                'qty_available' => 'required',
            ], [],
            [
                'vaccine_id' => 'Vaccine',
                'healthcare_centre_id' => 'Healthcare Centre',
                'code' => 'Code',
                'start_date' => 'Start Date',
                'end_date' => 'End Date',
                'qty_available' => 'Qty Available',
            ]);
            if($request->qty_available < $vaccineBatch->qty_administered){
                return redirect()->back()->with('result', ['error', 'Qty available cant less than qty administered']);
            }

        DB::beginTransaction();
        try{
            $vaccineBatch->update($request->all());
            DB::commit();
            return redirect()->back()->with('result', ['success', 'Data #'.$vaccineBatch->code.' Updated Successfully.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => 'Error Occur.']);
        }
    }

    public function destroy(Request $request, VaccineBatch $vaccineBatch) {
        DB::beginTransaction();
        try {
            $vaccineBatch->delete();
            DB::commit();
            $result = 'Data #'.$vaccineBatch->code.' Deleted Successfully.';
            $request->session()->flash('result', ['success', $result]);
            return response()->json(['status' => 1, 'text' => $result]);
        }catch(Exception $ex){
            DB::rollBack();
            return response()->json(['status' => 0, 'text' => 'Error Occur.']);
        }
    }
}
