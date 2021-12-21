@extends('layouts.patient')

@section('page-title')
    Vaccine Patient Data
@endsection

@section('page-parent-route')
    Vaccine Patient
@endsection

@section('page-current-route')
    Index
@endsection

@section('page-desc')
    Page to manage vaccine patient data
@endsection

@section('page-content-title')
    <div class="row align-items-center">
        <div class="col-md">
            <h4 class="my-2 font-weight-bold text-dark"><i class="fa fa-fw fa-users-cog me-1"  style="color:#D8201C!important;"></i> Vaccine Patient Data </h4>
        </div>
        <div class="col-md text-end">
            <a href="javascript:;" onclick="show_hide_insert()" class="btn btn-sm btn-success"><i class="fa fa-fw fa-plus me-1"></i> Add Data</a>
        </div>
    </div>
@endsection

@section('page-content-body')

    <div class="row">
        {{-- <div class="col-12">
            <div id="insert-box">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md">
                                <h6 class="my-2 font-weight-bold text-dark">
                                    <i class="fa fa-fw fa-plus me-1"></i>
                                    Add Vaccine Patient Data
                                </h6>
                            </div>
                            <div class="col-md text-end my-auto">
                                <a href="javascript:;" onclick="show_hide_insert()" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-times"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('patient.vaccine_patient.store') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                    <label>Vaccine Batch</label>
                                        <select name="vaccine_batch_id" class="form-control @error('vaccine_batch_id') is-invalid @enderror select2">
                                            <option value="">-Choose-</option>
                                            @foreach ($data_vaccine_batch as $item)
                                                <option value="{{ $item->id }}" {{ (old('vaccine_batch_id') == $item->id) ? "selected" : "" }}>
                                                    {{ $item->healthcare_centre->name }} 
                                                    / 
                                                    {{ $item->healthcare_centre->address }}
                                                    /
                                                    {{ format_date($item->start_date) }} - {{ format_date($item->end_date) }}
                                                    /
                                                    {{ $item->vaccine->name }}
                                                    /
                                                    {{ $item->code }} 
                                                </option>
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
                                                <option value="{{ $item->id }}" {{ (old('patient_id') == $item->id) ? "selected" : "" }}>{{ $item->name }}</option>
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
                                        <input type="date" class="form-control @error('vaccine_date') is-invalid @enderror" name="vaccine_date" value="{{ old('vaccine_date') }}">
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
                                                <option value="{{ $key }}" {{ (old('status') == $key) ? "selected" : "" }}>{{ $value }}</option>
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
            </div>
        </div> --}}
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
                    <thead>
                        <th>#</th>
                        <th>Vaccine Batch</th>
                        <th>Patient</th>
                        <th>Vaccine Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        @if ( ! $errors->any())
        $('#insert-box').hide();
        @endif
        function show_hide_insert() {
            $('#insert-box').toggle('fast', 'swing');
        }
        $('#datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('patient.vaccine_patient.index') }}",
            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'vaccine_batch_id',
                    name: 'vaccine_batch_id'
                },
                {
                    data: 'patient_id',
                    name: 'patient_id'
                },
                {
                    data: 'vaccine_date',
                    name: 'vaccine_date'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            order: [[ 0, "code" ]]
        });

    </script>
@endsection
