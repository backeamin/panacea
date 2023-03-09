@extends('layouts.auth_layout')
@section('page_title')
    Register
@endsection
@section('main_content')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label for="fullname">Full Name</label>
            <input id="fullname" type="text" placeholder="Enter your name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"   autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input id="phone_number" type="text" placeholder="Enter your phone number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}"   autocomplete="phone_number" autofocus>

            @error('phone_number')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="emailaddress">Email address</label>
            <input id="emailaddress" type="email" placeholder="Enter your email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"   autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" placeholder="Enter your password" class="form-control @error('password') is-invalid @enderror" name="password"   autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><div class="form-group">
            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" placeholder="Retype your password" class="form-control" name="password_confirmation"   autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox"   onchange="changeButtonStatus()" class="custom-control-input" id="checkbox-signup">
                <label class="custom-control-label" for="checkbox-signup">I accept <a href="javascript: void(0);" class="text-dark">Terms and Conditions</a></label>
            </div>
        </div>
        <div class="form-group mb-0 text-center">
            <button class="btn btn-gradient btn-block" disabled id="submit_button" type="submit"> Sign Up Free </button>
        </div>

    </form>

    <div class="row mt-4">
        <div class="col-sm-12 text-center">
            <p class="text-muted mb-0">Already have an account? <a href="{{route('login')}}" class="text-dark ml-1"><b>Log in</b></a></p>
        </div>
    </div>
@endsection
<script>
    function changeButtonStatus(){
        if(document.getElementById('checkbox-signup').checked)
        {
            document.getElementById('submit_button').removeAttribute('disabled')
        }else {
            document.getElementById('submit_button').setAttribute('disabled', true)
        }
    }
</script>
