@extends('layouts.auth')

@section('content')
<div class="row">
    <div class="col-lg-6 d-none d-lg-block bg-login-image">
        <img src="{{ url('assets/images/faces/2.jpg') }}" alt="" width="400px" height="400px">
    </div>
    <div class="col-lg-6 my-auto">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Alumni Supervisor Check</h1>
            </div>
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form method="POST" action="{{ route('auth.check_alumni_supervisor') }}" class="user">
                @csrf
                @method('POST')
                <div class="form-group">
                    <input type="text" class="form-control @error('student_id_number') is-invalid @enderror" placeholder="Alumni Student ID" name="student_id_number" value="{{ old('student_id_number') }}">
                    @error('student_id_number')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Alumni Name" name="name" value="{{ old('name') }}">
                    @error('name')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control @error('major') is-invalid @enderror" placeholder="Alumni Major" name="major" value="{{ old('major') }}">
                    @error('major')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <button class="btn btn-info btn-block" type="submit">Check</button>
            </form>
        </div>
    </div>
</div>
@endsection