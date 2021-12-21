@extends('layouts.admin')

@section('page-title')
    Vaccine Data
@endsection

@section('page-parent-route')
    Vaccine
@endsection

@section('page-current-route')
    Detail
@endsection

@section('page-desc')
    Detail vaccine data
    <br>
    <a href="{{ route('admin.vaccine.index') }}" class="my-2 btn btn-sm btn-secondary me-1"><i class="fa fa-fw fa-arrow-left me-1"></i> Back</a>
@endsection

@section('page-content-title')
    <div class="row align-items-center">
        <div class="col-md">
            <h4 class="m-0 font-weight-bold text-dark"><i class="fa fa-fw fa-eye me-1" style="color:#D8201C!important;"></i> Detail Data Vaccine #{{ $data->name }}</h6>
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
                    <input readonly type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data->name }}">
                    @error('name')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                <label>Manufacturer</label>
                    <input readonly type="text" class="form-control @error('manufacturer') is-invalid @enderror" name="manufacturer" value="{{ $data->manufacturer }}">
                    @error('manufacturer')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                <label>Status</label>
                    <input readonly type="text" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ returnStatus($data->status) }}">
                    @error('status')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
    <script>
        $(document).ready(function() {
            // for display myimg
            $('#myimg').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                $('#preview-myimg').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection

