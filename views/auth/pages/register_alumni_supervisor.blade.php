@extends('layouts.auth')

@section('content')
<div class="row">
    {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image">
        <img src="{{ url('assets/images/faces/2.jpg') }}" alt="" width="400px" height="400px">
    </div> --}}
    <div class="offset-2 col-lg-8 my-auto">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Alumni Supervisor Register</h1>
            </div>
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form method="POST" action="{{ route('auth.register_alumni_supervisor') }}" class="user">
                @csrf
                @method('POST')
                <input type="hidden" name="alumni_id" value="{{ $alumni->id }}">
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
                        <label>Position</label>
                            <input type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}">
                            @error('position')<small class="invalid-feedback">{{ $message }}</small>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                        <label>Company Name</label>
                            <input type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}">
                            @error('company_name')<small class="invalid-feedback">{{ $message }}</small>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                        <label>Company Address</label>
                            <textarea name="company_address" id="" cols="30" rows="10" class="form-control  @error('company_address') is-invalid @enderror">{{ old('company_address') }}</textarea>
                            @error('company_address')<small class="invalid-feedback">{{ $message }}</small>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                        <label>Company Phone Number</label>
                            <input type="text" class="form-control @error('company_phone_number') is-invalid @enderror" name="company_phone_number" value="{{ old('company_phone_number') }}">
                            @error('company_phone_number')<small class="invalid-feedback">{{ $message }}</small>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                        <label>Company Email</label>
                            <input type="email" class="form-control @error('company_email') is-invalid @enderror" name="company_email" value="{{ old('company_email') }}">
                            @error('company_email')<small class="invalid-feedback">{{ $message }}</small>@enderror
                        </div>
                    </div>
                </div>
                <button class="btn btn-info btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection