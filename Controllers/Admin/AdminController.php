<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Exports\AdminExport;
use App\Imports\AdminImport;
use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Intervention\Image\Facades\Image as Image;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index(Request $request) {
        if($request->ajax()){
            $data = Admin::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        return actionBtn('Admin #'. $data->name, route('admin.admin.index'), route('admin.admin.show', $data->id), route('admin.admin.edit', $data->id), route('admin.admin.destroy', $data->id));
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.admin.index');
    }

    public function create(){
        return view('admin.admin.create');
    }

    public function store(Request $request) {
        $request->validate(
            [
                'username' => 'required|unique:admins,username',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
                'name' => 'required|unique:admins,name',
                'address' => 'required',
                'phone_number' => 'required|unique:admins,phone_number',
                'myimg' =>'required|mimes:jpeg,png|max:2048',
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
            return redirect()->back()->with('result', ['success', 'Data #'.$admin->name.' Added Successfully.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => $ex->getMessage()]);
        }
    }

    public function show(Admin $admin) {
        return view('admin.admin.show', ['data' => $admin]);
    }

    public function edit(Admin $admin) {
        return view('admin.admin.edit', ['data' => $admin]);
    }

    public function profile(Admin $admin) {
        return view('admin.profile.index', ['data' => $admin]);
    }

    public function update(Request $request, Admin $admin) {
        $request->validate(
            [
                'username' => 'required|unique:admins,username,' . $admin->id,
                'name' => 'required|unique:admins,name,'. $admin->id,
                'address' => 'required',
                'phone_number' => 'required|unique:admins,phone_number,'. $admin->id,
                'myimg' =>'nullable|mimes:jpeg,png|max:2048',
            ], [],
            [
                'username' => 'Username',
                'name' => 'Name',
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
                $request['img'] = updateImg('upload/admin/admin/', $admin->img);
            }
            
            if($request->password && $request->password_confirmation){
                $admin->update($request->all());
            }else{
                $admin->update($request->except(['password']));
            }
            DB::commit();
            return redirect()->back()->with('result', ['success', 'Data #'.$admin->name.' Updated Successfully.']);

        }catch(Exception $ex){
            DB::rollback();
            return response()->json(['status' => 0, 'text' => 'Error Occur.']);
        }
    }

    public function destroy(Request $request, Admin $admin) {
        DB::beginTransaction();
        try {
            deleteImg('upload/admin/admin/', $admin->img);
            $admin->delete();
            DB::commit();
            $result = 'Data #'.$admin->name.' Deleted Successfully.';
            $request->session()->flash('result', ['success', $result]);
            return response()->json(['status' => 1, 'text' => $result]);
        }catch(Exception $ex){
            DB::rollBack();
            return response()->json(['status' => 0, 'text' => 'Error Occur.']);
        }
    }

    // public function export() {
    //     ob_end_clean();
    //     ob_start();
    //     return Excel::download(new AdminExport, 'admin.xlsx');
    // }

    // public function import(Request $request) {
    //     $request->validate(
    //         [
    //             'file_import' => 'required|mimes:xlsx,xls,csv|max:2048',
    //         ], [],
    //         [
    //             'file_import' => 'File Import',
    //         ]
    //     );
    //     Excel::import(new AdminImport, request()->file('file_import'));
    //     return back();
    // }

    // public function form_import() {
    //     return view('admin.admin.import.form');
    // }
}
