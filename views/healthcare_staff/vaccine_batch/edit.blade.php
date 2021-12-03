@extends('layouts.healthcare_staff')

@section('page-title')
    Vaccine Batch Data
@endsection

@section('page-parent-route')
    Vaccine Batch
@endsection

@section('page-current-route')
    Edit
@endsection

@section('page-desc')
    Page to edit vaccine batch data
    <br>
    <a href="{{ route('healthcare_staff.vaccine_batch.index') }}" class="my-2 btn btn-sm btn-secondary me-1"><i class="fa fa-fw fa-arrow-left me-1"></i> Back</a>
@endsection

@section('page-content-title')
    <div class="row align-items-center">
        <div class="col-md">
            <h4 class="m-0 font-weight-bold text-dark"><i class="fa fa-fw fa-edit me-1" style="color:#D8201C!important;"></i> Edit Data Vaccine Batch#{{ $data->code }}</h6>
        </div>
    </div>
@endsection

@section('page-content-body')
<div class="row">
    <div class="col-md">
        <form method="POST" action="{{ route('healthcare_staff.vaccine_batch.update', $data->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                    <label>Vaccine</label>
                        <select name="vaccine_id" class="form-control @error('vaccine_id') is-invalid @enderror select2">
                            <option value="">-Choose-</option>
                            @foreach ($data_vaccine as $item)
                                <option value="{{ $item->id }}" {{ (old('vaccine_id', $data->vaccine_id) == $item->id) ? "selected" : "" }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('vaccine_id')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                    <label>Healthcare Centre</label>
                        <select name="healthcare_centre_id" class="form-control @error('healthcare_centre_id') is-invalid @enderror select2">
                            <option value="">-Choose-</option>
                            @foreach ($data_healthcare_centre as $item)
                                <option value="{{ $item->id }}" {{ (old('healthcare_centre_id', $data->healthcare_centre_id) == $item->id) ? "selected" : "" }}>{{ $item->name . ' / ' . $item->address }}</option>
                            @endforeach
                        </select>
                        @error('healthcare_centre_id')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                    <label>Code</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code', $data->code) }}">
                        @error('code')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                    <label>Start Date</label>
                        <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date', $data->start_date) }}">
                        @error('start_date')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                    <label>End Date</label>
                        <input type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date', $data->end_date) }}">
                        @error('end_date')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                    <label>Qty Available</label>
                        <input type="number" class="form-control @error('qty_available') is-invalid @enderror" name="qty_available" value="{{ old('qty_available', $data->qty_available) }}">
                        @error('qty_available')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
            <div class="text-end my-3">
                <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-undo me-1"></i>Reset</button>
                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-fw fa-paper-plane me-1"></i>Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
