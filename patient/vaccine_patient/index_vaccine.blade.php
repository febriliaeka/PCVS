@extends('layouts.patient')

@section('page-title')
    Vaccine Data
@endsection

@section('page-parent-route')
    Vaccine
@endsection

@section('page-current-route')
    Index
@endsection

@section('page-desc')
    Page to see vaccine data
@endsection

@section('page-content-title')
    <div class="row align-items-center">
        <div class="col-md">
            <h4 class="my-2 font-weight-bold text-dark"><i class="fa fa-fw fa-users-cog me-1"  style="color:#D8201C!important;"></i> Vaccine Data </h4>
        </div>
        <div class="col-md text-end">
        </div>
    </div>
@endsection

@section('page-content-body')

    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('patient.vaccine_patient.index_vaccine') }}",
            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
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
