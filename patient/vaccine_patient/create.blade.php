@extends('layouts.patient')

@section('page-title')
    Vaccine Patient Data
@endsection

@section('page-parent-route')
    Vaccine Patient
@endsection

@section('page-current-route')
    Add
@endsection

@section('page-desc')
    Page to add vaccine patient data
    <br>
    <a href="{{ route('patient.vaccine_patient.index_centre', $data_vaccine_batch->vaccine_id) }}" class="my-2 btn btn-sm btn-secondary me-1"><i class="fa fa-fw fa-arrow-left me-1"></i> Back</a>
@endsection

@section('page-content-title')
    <div class="row align-items-center">
        <div class="col-md">
            <h4 class="m-0 font-weight-bold text-dark"><i class="fa fa-fw fa-edit me-1" style="color:#D8201C!important;"></i> Add Data Vaccine Patient</h6>
        </div>
    </div>
@endsection

@section('page-content-body')
<div class="row">
    <div class="col-md">
        <form method="POST" action="{{ route('patient.vaccine_patient.store') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                    <label>Vaccine Batch</label>
                        <input type="hidden" name="vaccine_batch_id" value="{{ $data_vaccine_batch->id}}">
                        <input readonly type="text" class="form-control" 
                        value="{{ $data_vaccine_batch->healthcare_centre->name }} / {{ $data_vaccine_batch->healthcare_centre->address }} / {{ format_date($data_vaccine_batch->start_date) }} - {{ format_date($data_vaccine_batch->end_date) }} / {{ $data_vaccine_batch->vaccine->name }} / {{ $data_vaccine_batch->code }}">  
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                    <label>Patient</label>
                        <input type="hidden" name="patient_id" value="{{ $data_patient->id}}">
                        <input readonly type="text" class="form-control" 
                        value="{{ $data_patient->name }}">  
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                    <label>Vaccine Date</label>
                        <input type="date" class="form-control @error('vaccine_date') is-invalid @enderror" name="vaccine_date" value="{{ old('vaccine_date') }}">
                        @error('vaccine_date')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label>Note</label>
                        <textarea name="note" id="" cols="30" rows="10" class="form-control  @error('note') is-invalid @enderror">{{ old('note') }}</textarea>
                        @error('note')<small class="invalid-feedback">{{ $message }}</small>@enderror
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
