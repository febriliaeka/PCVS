@extends('layouts.admin')

@section('page-title')
    Admin Data
@endsection

@section('page-parent-route')
    Admin
@endsection

@section('page-current-route')
    Edit
@endsection

@section('page-desc')
    Page to edit admin data
    <br>
    <a href="{{ route('admin.admin.index') }}" class="my-2 btn btn-sm btn-secondary me-1"><i class="fa fa-fw fa-arrow-left me-1"></i> Back</a>
@endsection

@section('page-content-title')
    <div class="row align-items-center">
        <div class="col-md">
            <h4 class="m-0 font-weight-bold text-dark"><i class="fa fa-fw fa-edit me-1" style="color:#D8201C!important;"></i> Edit Data Admin #{{ $data->username }}</h6>
        </div>
    </div>
@endsection

@section('page-content-body')
<div class="row">
    <div class="col-md">
        <form method="POST" action="{{ route('admin.admin.update', $data->id) }}" enctype="multipart/form-data">
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
                        <label>Address</label>
                        <textarea name="address" id="" cols="30" rows="10" class="form-control  @error('address') is-invalid @enderror">{{ old('address', $data->address) }}</textarea>
                        @error('address')<small class="invalid-feedback">{{ $message }}</small>@enderror

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                    <label>Phone Number</label>
                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number', $data->phone_number) }}">
                        @error('phone_number')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                    <label>Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $data->username) }}">
                        @error('username')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                    <label>Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">
                        @error('password')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                    <label>Password Confirmation</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}">
                        @error('password_confirmation')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md">
                    <div class="form-group">
                    <label>Image</label>
                        <input type="file" class="form-control @error('myimg') is-invalid @enderror" name="myimg" value="{{ old('myimg') }}" id="myimg">
                        @error('myimg')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>
                </div>
                <div class="col-md-12 my-2">
                    <img id="preview-myimg" src="{{ ($data->img) ? url('/upload/admin/admin/', $data->img) : 'https://www.riobeauty.co.uk/images/product_image_not_found.gif' }}" alt="preview image" style="max-height: 400px;">
                </div>
            </div> --}}
            <div class="text-end my-3">
                <button type="reset" class="btn btn-danger"><i class="fa fa-fw fa-undo me-1"></i>Reset</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-paper-plane me-1"></i>Submit</button>
            </div>
        </form>
    </div>
</div>
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

