@extends('layouts.auth_layout')
@section('title')
    404 ERROR
@endsection
    @section('main_content')
        <div class="text-center mt-3 pt-1">
            <h1 class="text-error">404</h1>
            <h3 class="text-uppercase text-danger mt-3 mb-0">Page Not Found</h3>
            <p class="text-muted mt-3">It's looking like you may have taken a wrong turn. Don't worry... it
                happens to the best of us. Here's a
                little tip that might help you get back on track.</p>

            <a class="btn btn-md btn-block btn-gradient waves-effect waves-light mt-3" href="{{route('home')}}"> Return Home</a>
        </div>
@endsection
