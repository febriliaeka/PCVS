@extends('layouts.auth')

@section('content')
<div class="row">
    <div class="col-lg-8 offset-2 my-auto text-center">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Administrator Login</h1>
            </div>
            @include('components.error')
            <form method="POST" action="{{ route('auth.login_admin') }}" class="user">
                @csrf
                @method('POST')
                <input type="hidden" name="login_as" value="{{ $login_as }}">
                <div class="mb-2">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" name="username" value="{{ old('username') }}">
                    @error('username')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-2">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                    @error('password')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <button class="btn btn-info btn-block text-white" type="submit">Login</button>
            </form>
            <div class="mt-3">
                <a href="{{ route('auth.register.form_admin') }}" class="text-muted">Sign Up</a>
            </div>
        </div>
    </div>
</div>
    
@endsection