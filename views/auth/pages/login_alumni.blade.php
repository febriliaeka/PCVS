@extends('layouts.auth')

@section('content')
<div class="row">
    <div class="col-lg-8 offset-2 my-auto text-center">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Alumni Login</h1>
            </div>
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form method="POST" action="{{ route('auth.login_alumni') }}" class="user">
                @csrf
                @method('POST')
                <input type="hidden" name="login_as" value="{{ $login_as }}">
                <div class="mb-2">
                    <input type="text" class="form-control @error('student_id_number') is-invalid @enderror" placeholder="Student ID" name="student_id_number" value="{{ old('student_id_number') }}">
                    @error('student_id_number')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <button class="btn btn-info btn-block text-white" type="submit">Login</button>
            </form>
        </div>
    </div>
</div>
@endsection