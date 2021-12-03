@extends('layouts.admin')

@section('page-title')
    Healthcare Centre Data
@endsection

@section('page-parent-route')
    Healthcare Centre
@endsection

@section('page-current-route')
    Detail
@endsection

@section('page-desc')
    Detail healthcare centre data
    <br>
    <a href="{{ route('admin.healthcare_centre.index') }}" class="my-2 btn btn-sm btn-secondary me-1"><i class="fa fa-fw fa-arrow-left me-1"></i> Back</a>
@endsection

@section('page-content-title')
    <div class="row align-items-center">
        <div class="col-md">
            <h4 class="m-0 font-weight-bold text-dark"><i class="fa fa-fw fa-eye me-1" style="color:#D8201C!important;"></i> Detail Data Healthcare Centre #{{ $data->username }}</h6>
        </div>
    </div>
@endsection

@section('page-content-body')
<div class="row">
    <div class="col-md">
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                <label>Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" readonly name="name" value="{{ old('name', $data->name) }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    <label>Address</label>
                    <textarea readonly name="address" id="" cols="30" rows="10" class="form-control  @error('address') is-invalid @enderror">{{ old('address', $data->address) }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

