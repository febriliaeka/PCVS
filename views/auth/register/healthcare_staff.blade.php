@extends('layouts.auth')

@section('content')
<div class="row">
    <div class="col-lg-8 offset-2 my-auto">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Staff Register</h1>
            </div>
            @include('components.error')
            <form method="POST" action="{{ route('auth.register.healthcare_staff') }}" class="user" enctype="multipart/form-data">
                @csrf
                @method('POST')
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
                        <label>Staff ID</label>
                            <input type="text" class="form-control @error('staff_id') is-invalid @enderror" name="staff_id" value="{{ old('staff_id') }}">
                            @error('staff_id')<small class="invalid-feedback">{{ $message }}</small>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                        <label>Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                            @error('name')<small class="invalid-feedback">{{ $message }}</small>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                        <label>Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                            @error('email')<small class="invalid-feedback">{{ $message }}</small>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" id="" cols="30" rows="10" class="form-control  @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                            @error('address')<small class="invalid-feedback">{{ $message }}</small>@enderror

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                        <label>Phone Number</label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}">
                            @error('phone_number')<small class="invalid-feedback">{{ $message }}</small>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                        <label>Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}">
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
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                        <label>Image</label>
                            <input type="file" class="form-control @error('myimg') is-invalid @enderror" name="myimg" value="{{ old('myimg') }}" id="myimg">
                            @error('myimg')<small class="invalid-feedback">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    {{-- <div class="col-md-12 my-2">
                        <img id="preview-myimg" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif" alt="preview image" style="max-height: 400px;">
                    </div> --}}
                </div>
                <div class="text-end my-3">
                    <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-undo me-1"></i>Reset</button>
                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-fw fa-paper-plane me-1"></i>Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection