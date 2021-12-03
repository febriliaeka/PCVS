@extends('layouts.home')

@section('page-title')
    Login As
@endsection

@section('page-parent-route')
    Login
@endsection

@section('page-current-route')
    Index
@endsection

@section('page-desc')
    Hi, what do you need today 
@endsection

{{-- @section('page-content-title')
    <div class="row align-items-center">
        <div class="col-md">
            <h4 class="my-2 font-weight-bold text-dark"><i class="fa fa-fw fa-users-cog me-1"></i> Admin Data </h4>
        </div>
        <div class="col-md text-end">
            <a href="{{ route('admin.export.admin') }}" class="btn btn-sm btn-primary"><i class="fas fa-file-export me-1"></i> Export</a>
            <a href="javascript:;" onclick="show_hide_insert()" class="btn btn-sm btn-success"><i class="fa fa-fw fa-plus me-1"></i> Add Data</a>
        </div>
    </div>
@endsection --}}

@section('page-content-body')
    <div class="row text-center">
        <div class="col-4">
            <a href="{{ route('auth.form_login_admin') }}">
                <div class="alert alert-primary">
                    <h4 class="alert-heading">
                        Admin
                    </h4>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ route('auth.form_login_healthcare_staff') }}">
                <div class="alert alert-primary">
                    <h4 class="alert-heading">
                        Healthcare Staff
                    </h4>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a href="{{ route('auth.form_login_patient') }}">
                <div class="alert alert-primary">
                    <h4 class="alert-heading">
                        Patient
                    </h4>
                </div>
            </a>
        </div>
    </div>
@endsection
