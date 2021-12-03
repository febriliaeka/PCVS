@extends('layouts.admin')

@section('page-title')
    Vaccine Data
@endsection

@section('page-parent-route')
    Vaccine
@endsection

@section('page-current-route')
    Edit
@endsection

@section('page-desc')
    Page to edit vaccine data
    <br>
    <a href="{{ route('admin.vaccine.index') }}" class="my-2 btn btn-sm btn-secondary me-1"><i class="fa fa-fw fa-arrow-left me-1"></i> Back</a>
@endsection

@section('page-content-title')
    <div class="row align-items-center">
        <div class="col-md">
            <h4 class="m-0 font-weight-bold text-dark"><i class="fa fa-fw fa-edit me-1" style="color:#D8201C!important;"></i> Edit Data Vaccine #{{ $data->username }}</h6>
        </div>
    </div>
@endsection

@section('page-content-body')
<div class="row">
    <div class="col-md">
        <form method="POST" action="{{ route('admin.vaccine.update', $data->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                    <label>Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $data->name) }}">
                        @error('name')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                    <label>Manufacturer</label>
                        <input type="text" class="form-control @error('manufacturer') is-invalid @enderror" name="manufacturer" value="{{ old('manufacturer', $data->manufacturer) }}">
                        @error('manufacturer')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                    <label>Status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="">-Choose-</option>
                            @foreach (returnStatus() as $key => $value)
                                <option value="{{ $key }}" {{ (old('status', $data->status) == $key) ? "selected" : "" }}>{{ $value }}</option>
                            @endforeach
                        </select>
                        @error('status')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
            <div class="text-end my-3">
                <button type="reset" class="btn btn-danger"><i class="fa fa-fw fa-undo me-1"></i>Reset</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-paper-plane me-1"></i>Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection


