@extends('layouts.healthcare_staff')

@section('page-title')
    Vaccine Patient Data
@endsection

@section('page-parent-route')
    Vaccine Patient
@endsection

@section('page-current-route')
    Detail
@endsection

@section('page-desc')
    Detail vaccine patient data
    <br>
    <a href="{{ route('healthcare_staff.vaccine_patient.index') }}" class="my-2 btn btn-sm btn-secondary me-1"><i class="fa fa-fw fa-arrow-left me-1"></i> Back</a>
@endsection

@section('page-content-title')
    <div class="row align-items-center">
        <div class="col-md">
            <h4 class="m-0 font-weight-bold text-dark"><i class="fa fa-fw fa-eye me-1" style="color:#D8201C!important;"></i> Detail Data Vaccine Patient #{{ $data->username }}</h6>
        </div>
    </div>
@endsection

@section('page-content-body')
<div class="row">
    <div class="col-md">
        <div class="form-group">
        <label>Vaccine Batch</label>
        <input readonly type="text" class="form-control @error('vaccine_date') is-invalid @enderror" name="vaccine_date" 
        value="{{ $data->vaccine_batch->healthcare_centre->name }} / {{ $data->vaccine_batch->healthcare_centre->address }} / {{ format_date($data->vaccine_batch->start_date) }} - {{ format_date($data->vaccine_batch->end_date) }} / {{ $data->vaccine_batch->vaccine->name }} / {{ $data->vaccine_batch->code }}     
        ">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md">
        <div class="form-group">
        <label>Patient</label>
        <input readonly type="text" class="form-control @error('vaccine_date') is-invalid @enderror" name="vaccine_date" value="{{ $data->patient->name }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md">
        <div class="form-group">
        <label>Vaccine Date</label>
            <input readonly type="text" class="form-control @error('vaccine_date') is-invalid @enderror" name="vaccine_date" value="{{ format_date($data->vaccine_date) }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md">
        <div class="form-group">
        <label>Status</label>
        <input readonly type="text" class="form-control @error('vaccine_date') is-invalid @enderror" name="vaccine_date" value="{{ returnStatusVaccinePatient($data->status) }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md">
        <div class="form-group">
            <label>Note</label>
            <textarea readonly name="note" id="" cols="30" rows="10" class="form-control  @error('note') is-invalid @enderror">{{ old('note', $data->note) }}</textarea>
        </div>
    </div>
</div>
@endsection


