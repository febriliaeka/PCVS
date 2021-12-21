@extends('layouts.patient')

@section('page-title')
    Vaccine Patient Data
@endsection

@section('page-parent-route')
    Vaccine Patient
@endsection

@section('page-current-route')
    Edit
@endsection

@section('page-desc')
    Page to edit vaccine patient data
    <br>
    <a href="{{ route('patient.vaccine_patient.index') }}" class="my-2 btn btn-sm btn-secondary me-1"><i class="fa fa-fw fa-arrow-left me-1"></i> Back</a>
@endsection

@section('page-content-title')
    <div class="row align-items-center">
        <div class="col-md">
            <h4 class="m-0 font-weight-bold text-dark"><i class="fa fa-fw fa-edit me-1" style="color:#D8201C!important;"></i> Edit Data Vaccine Patient#{{ $data->code }}</h6>
        </div>
    </div>
@endsection

@section('page-content-body')
<div class="row">
    <div class="col-md">
        <form method="POST" action="{{ route('patient.vaccine_patient.update', $data->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                    <label>Vaccine Batch</label>
                        <select name="vaccine_batch_id" class="form-control @error('vaccine_batch_id') is-invalid @enderror select2">
                            <option value="">-Choose-</option>
                            @foreach ($data_vaccine_batch as $item)
                                <option value="{{ $item->id }}" {{ (old('vaccine_batch_id', $data->vaccine_batch_id) == $item->id) ? "selected" : "" }}>{{ $item->healthcare_centre->name }} / {{ $item->healthcare_centre->address }} / {{ format_date($item->start_date) }} - {{ format_date($item->end_date) }} / {{ $item->vaccine->name }} / {{ $item->code }}</option>
                            @endforeach
                        </select>   
                        @error('vaccine_batch_id')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                    <label>Patient</label>
                        <select name="patient_id" class="form-control @error('patient_id') is-invalid @enderror select2">
                            <option value="">-Choose-</option>
                            @foreach ($data_patient as $item)
                                <option value="{{ $item->id }}" {{ (old('patient_id', $data->patient_id) == $item->id) ? "selected" : "" }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('patient_id')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                    <label>Vaccine Date</label>
                        <input type="date" class="form-control @error('vaccine_date') is-invalid @enderror" name="vaccine_date" value="{{ old('vaccine_date', $data->vaccine_date) }}">
                        @error('vaccine_date')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                    <label>Status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="">-Choose-</option>
                            @foreach (returnStatusVaccinePatient() as $key => $value)
                                <option value="{{ $key }}" {{ (old('status', $data->status) == $key) ? "selected" : "" }}>{{ $value }}</option>
                            @endforeach
                        </select>
                        @error('status')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label>Note</label>
                        <textarea name="note" id="" cols="30" rows="10" class="form-control  @error('note') is-invalid @enderror">{{ old('note', $data->note) }}</textarea>
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
