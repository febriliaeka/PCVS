@extends('layouts.admin')

@section('page-title')
    Healthcare Staff Data
@endsection

@section('page-parent-route')
    Healthcare Staff
@endsection

@section('page-current-route')
    Detail
@endsection

@section('page-desc')
    Detail healthcare staff data
    <br>
    <a href="{{ route('admin.healthcare_staff.index') }}" class="my-2 btn btn-sm btn-secondary me-1"><i class="fa fa-fw fa-arrow-left me-1"></i> Back</a>
@endsection

@section('page-content-title')
    <div class="row align-items-center">
        <div class="col-md">
            <h4 class="m-0 font-weight-bold text-dark"><i class="fa fa-fw fa-eye me-1" style="color:#D8201C!important;"></i> Detail Data Healthcare Staff #{{ $data->username }}</h6>
        </div>
    </div>
@endsection

@section('page-content-body')
<div class="row">
    <div class="col-md">
        <div class="form-group">
        <label>Healthcare Centre</label>
            <input readonly type="text" class="form-control @error('healthcare_centre_id') is-invalid @enderror" name="healthcare_centre_id" value="{{ old('healthcare_centre_id', $data->healthcare_centre->name . '/' . $data->healthcare_centre->address) }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md">
        <div class="form-group">
        <label>Staff ID</label>
            <input readonly type="text" class="form-control @error('staff_id') is-invalid @enderror" name="staff_id" value="{{ old('staff_id', $data->staff_id) }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md">
        <div class="form-group">
        <label>Name</label>
            <input readonly type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $data->name) }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md">
        <div class="form-group">
        <label>Email</label>
            <input readonly type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $data->email) }}">
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
<div class="row">
    <div class="col-md">
        <div class="form-group">
        <label>Phone Number</label>
            <input readonly type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number', $data->phone_number) }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md">
        <div class="form-group">
        <label>Username</label>
            <input readonly type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $data->username) }}">
        </div>
    </div>
</div>
{{-- <div class="row">
    <div class="col-md">
        <div class="form-group">
        <label>Image</label>
            <div class="col-md-12 my-2">
                <img id="preview-myimg" src="{{ ($data->img) ? url('/upload/healthcare_staff/healthcare_staff/', $data->img) : 'https://www.riobeauty.co.uk/images/product_image_not_found.gif' }}" alt="preview image" style="max-height: 400px;">
            </div>
        </div>
    </div>
</div> --}}
@endsection


@section('js')
    {{-- <script>
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
    </script> --}}
@endsection

