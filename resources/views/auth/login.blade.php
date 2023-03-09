@extends('layouts.auth_layout')
@section('page_title')
    Log In
@endsection
@section('main_content')

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="email">Email address</label>
            <input id="email" type="email" placeholder="Enter your email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"   autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <a href="{{ route('password.request') }}" class="text-muted float-right"><small>Forgot your password?</small></a>

            <label for="password">Password</label>
            <input id="password" type="password" placeholder="Enter your password" class="form-control @error('password') is-invalid @enderror" name="password"   autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" name="remember" id="checkbox-signin" {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for="checkbox-signin">Remember me</label>
            </div>
        </div>

        <div class="form-group mb-0 text-center">
            <button class="btn btn-gradient btn-block" type="submit"> Log In </button>
        </div>

    </form>

    <div class="row mt-4">
        <div class="col-sm-12 text-center">
            <p class="text-muted mb-0">Don't have an account? <a href="{{route('register')}}" class="text-dark ml-1"><b>Sign Up</b></a></p>
        </div>
    </div>
@endsection
