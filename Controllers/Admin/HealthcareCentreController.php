<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\HealthcareCentre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Exception;

class HealthcareCentreController extends Controller
{
    public function index(Request $request) {
        if($request->ajax()){
            $data = HealthcareCentre::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        return actionBtn('HealthcareCentre #'. $data->name, route('admin.healthcare_centre.index'), route('admin.healthcare_centre.show', $data->id), route('admin.healthcare_centre.edit', $data->id), route('admin.healthcare_centre.destroy', $data->id));
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.healthcare_centre.index');
    }

    public function create(){
        return view('admin.healthcare_centre.create');
    }

    public function store(Request $request) {
        $request->validate(
            [
                'name' => 'required',
                'address' => 'required',
            ], [],
            [
                'name' => 'Name',
                'address' => 'Address',
            ]);

        DB::beginTransaction();
        try{
            
            $healthcareCentre = HealthcareCentre::create($request->all());
            DB::commit();
            return redirect()->back()->with('result', ['success', 'Data #'.$healthcareCentre->name.' Added Successfully.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => $ex->getMessage()]);
        }
    }

    public function show(HealthcareCentre $healthcareCentre) {
        return view('admin.healthcare_centre.show', ['data' => $healthcareCentre]);
    }

    public function edit(HealthcareCentre $healthcareCentre) {
        return view('admin.healthcare_centre.edit', ['data' => $healthcareCentre]);
    }

    public function profile(HealthcareCentre $healthcareCentre) {
        return view('admin.profile.index', ['data' => $healthcareCentre]);
    }

    public function update(Request $request, HealthcareCentre $healthcareCentre) {
        $request->validate(
            [
                'name' => 'required',
                'address' => 'required',
            ], [],
            [
                'name' => 'Name',
                'address' => 'Address',
            ]);

        DB::beginTransaction();
        try{
            $healthcareCentre->update($request->all());
            DB::commit();
            return redirect()->back()->with('result', ['success', 'Data #'.$healthcareCentre->name.' Updated Successfully.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => 'Error Occur.']);
        }
    }

    public function destroy(Request $request, HealthcareCentre $healthcareCentre) {
        DB::beginTransaction();
        try {
            $healthcareCentre->delete();
            DB::commit();
            $result = 'Data #'.$healthcareCentre->name.' Deleted Successfully.';
            $request->session()->flash('result', ['success', $result]);
            return response()->json(['status' => 1, 'text' => $result]);
        }catch(Exception $ex){
            DB::rollBack();
            return response()->json(['status' => 0, 'text' => 'Error Occur.']);
        }
    }
}
