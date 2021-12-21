@extends('layouts.admin')

@section('page-title')
    Vaccine Batch Data
@endsection

@section('page-parent-route')
    Vaccine Batch
@endsection

@section('page-current-route')
    Index
@endsection

@section('page-desc')
    Page to manage vaccine batch data
@endsection

@section('page-content-title')
    <div class="row align-items-center">
        <div class="col-md">
            <h4 class="my-2 font-weight-bold text-dark"><i class="fa fa-fw fa-users-cog me-1"  style="color:#D8201C!important;"></i> Vaccine Batch Data </h4>
        </div>
        <div class="col-md text-end">
            <a href="javascript:;" onclick="show_hide_insert()" class="btn btn-sm btn-success"><i class="fa fa-fw fa-plus me-1"></i> Add Data</a>
        </div>
    </div>
@endsection

@section('page-content-body')

    <div class="row">
        <div class="col-12">
            <div id="insert-box">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md">
                                <h6 class="my-2 font-weight-bold text-dark">
                                    <i class="fa fa-fw fa-plus me-1"></i>
                                    Add Vaccine Batch Data
                                </h6>
                            </div>
                            <div class="col-md text-end my-auto">
                                <a href="javascript:;" onclick="show_hide_insert()" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-times"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.vaccine_batch.store') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                    <label>Vaccine</label>
                                        <select name="vaccine_id" class="form-control @error('vaccine_id') is-invalid @enderror select2">
                                            <option value="">-Choose-</option>
                                            @foreach ($data_vaccine as $item)
                                                <option value="{{ $item->id }}" {{ (old('vaccine_id') == $item->id) ? "selected" : "" }}>{{ $item->name }}</option>
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
                                                <option value="{{ $item->id }}" {{ (old('healthcare_centre_id') == $item->id) ? "selected" : "" }}>{{ $item->name . ' / ' . $item->address }}</option>
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
                                        <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}">
                                        @error('code')<small class="invalid-feedback">{{ $message }}</small>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                    <label>Start Date</label>
                                        <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date') }}">
                                        @error('start_date')<small class="invalid-feedback">{{ $message }}</small>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                    <label>End Date</label>
                                        <input type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date') }}">
                                        @error('end_date')<small class="invalid-feedback">{{ $message }}</small>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                    <label>Qty Available</label>
                                        <input type="number" class="form-control @error('qty_available') is-invalid @enderror" name="qty_available" value="{{ old('qty_available') }}">
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
            </div>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
                    <thead>
                        <th>#</th>
                        <th>Code</th>
                        <th>Healthcare Centre</th>
                        <th>Vaccine</th>
                        <th>Date</th>
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
            ajax: "{{ route('admin.vaccine_batch.index') }}",
            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'code',
                    name: 'code'
                },
                {
                    data: 'healthcare_centre_id',
                    name: 'healthcare_centre_id'
                },
                {
                    data: 'vaccine_id',
                    name: 'vaccine_id'
                },
                {
                    data: 'date',
                    name: 'date'
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
