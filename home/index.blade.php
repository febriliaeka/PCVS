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

@section('page-content-body')
    <div class="row text-center">
        <div class="col-6">
            <a href="{{ route('auth.form_login_admin') }}">
                <div class="alert alert-primary">
                    <h4 class="alert-heading">
                        Admin
                    </h4>
                </div>
            </a>
        </div>
        {{-- <div class="col-4">
            <a href="{{ route('auth.form_login_healthcare_staff') }}">
                <div class="alert alert-primary">
                    <h4 class="alert-heading">
                        Healthcare Staff
                    </h4>
                </div>
            </a>
        </div> --}}
        <div class="col-6">
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
