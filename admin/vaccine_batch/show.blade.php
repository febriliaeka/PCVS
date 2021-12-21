@extends('layouts.admin')

@section('page-title')
    Vaccine Batch Data
@endsection

@section('page-parent-route')
    Vaccine Batch
@endsection

@section('page-current-route')
    Detail
@endsection

@section('page-desc')
    Detail vaccine batch data
    <br>
    <a href="{{ route('admin.vaccine_batch.index') }}" class="my-2 btn btn-sm btn-secondary me-1"><i class="fa fa-fw fa-arrow-left me-1"></i> Back</a>
@endsection

@section('page-content-title')
    <div class="row align-items-center">
        <div class="col-md">
            <h4 class="m-0 font-weight-bold text-dark"><i class="fa fa-fw fa-eye me-1" style="color:#D8201C!important;"></i> Detail Data Vaccine Batch #{{ $data->username }}</h6>
        </div>
    </div>
@endsection

@section('page-content-body')
<div class="row">
    <div class="col-md">
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                <label>Vaccine</label>
                    <input readonly type="text" class="form-control" value="{{ $data->vaccine->name }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                <label>Healthcare Centre</label>
                    <input readonly type="text" class="form-control" value="{{ $data->healthcare_centre->name . '/' . $data->healthcare_centre->address }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                <label>Code</label>
                    <input readonly type="text" class="form-control" value="{{ $data->code }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                <label>Start Date</label>
                    <input readonly type="text" class="form-control" value="{{ format_date($data->start_date) }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                <label>End Date</label>
                    <input readonly type="text" class="form-control" value="{{ format_date($data->end_date) }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                <label>Qty Available</label>
                    <input readonly type="text" class="form-control" value="{{ $data->qty_available }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                <label>Qty Administered</label>
                    <input readonly type="text" class="form-control" value="{{ $data->qty_administered }}">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


