@extends('layouts.master')
@section('title', 'Confirm Password')
@push('page-css')
    <style>
        .text-danger {
            color: #dc3545 !important;
        }
    </style>
@endpush
@section('content')
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0"> {{ __('Confirm Password') }}</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li> {{ __('Confirm Password') }}</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->
    <div class="page-content">
        <div class="container">
            <div class="login-popup" style="margin: 4.2rem auto 5rem;box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                <p class="text-primary"> {{ __('Please confirm your password before continuing.') }}</p>
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">{{ __('Password') }} <span class="text-danger">*</span> </label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @if (Route::has('password.request'))
                            <a class="text-left d-block mt-3" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>


                    <button style="width: 100%" type="submit" class="btn btn-primary">
                        {{ __('Confirm Password') }}
                    </button>

                </form>
            </div>
        </div>
    </div>
@endsection
