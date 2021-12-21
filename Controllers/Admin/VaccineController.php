<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Exception;

class VaccineController extends Controller
{
    public function index(Request $request) {
        if($request->ajax()){
            $data = Vaccine::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        return actionBtn('Vaccine #'. $data->name, route('admin.vaccine.index'), route('admin.vaccine.show', $data->id), route('admin.vaccine.edit', $data->id), route('admin.vaccine.destroy', $data->id));
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.vaccine.index');
    }

    public function create(){
        return view('admin.vaccine.create');
    }

    public function store(Request $request) {
        $request->validate(
            [
                'name' => 'required',
                'manufacturer' => 'required',
                'status' => 'required',
            ], [],
            [
                'name' => 'Name',
                'manufacturer' => 'Manufacturer',
                'status' => 'Status',
            ]);

        DB::beginTransaction();
        try{
            
            $vaccine = Vaccine::create($request->all());
            DB::commit();
            return redirect()->back()->with('result', ['success', 'Data #'.$vaccine->name.' Added Successfully.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => $ex->getMessage()]);
        }
    }

    public function show(Vaccine $vaccine) {
        return view('admin.vaccine.show', ['data' => $vaccine]);
    }

    public function edit(Vaccine $vaccine) {
        return view('admin.vaccine.edit', ['data' => $vaccine]);
    }

    public function profile(Vaccine $vaccine) {
        return view('admin.profile.index', ['data' => $vaccine]);
    }

    public function update(Request $request, Vaccine $vaccine) {
        $request->validate(
            [
                'name' => 'required',
                'manufacturer' => 'required',
                'status' => 'required',
            ], [],
            [
                'name' => 'Name',
                'manufacturer' => 'Manufacturer',
                'status' => 'Status',
            ]);

        DB::beginTransaction();
        try{
            $vaccine->update($request->all());
            DB::commit();
            return redirect()->back()->with('result', ['success', 'Data #'.$vaccine->name.' Updated Successfully.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => 'Error Occur.']);
        }
    }

    public function destroy(Request $request, Vaccine $vaccine) {
        DB::beginTransaction();
        try {
            $vaccine->delete();
            DB::commit();
            $result = 'Data #'.$vaccine->name.' Deleted Successfully.';
            $request->session()->flash('result', ['success', $result]);
            return response()->json(['status' => 1, 'text' => $result]);
        }catch(Exception $ex){
            DB::rollBack();
            return response()->json(['status' => 0, 'text' => 'Error Occur.']);
        }
    }
}
