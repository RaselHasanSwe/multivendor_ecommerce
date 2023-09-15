@extends('layouts.master')
@section('title', 'Login or Register')
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
            <h1 class="page-title mb-0">{{ __('login or Register') }}</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li>{{ __('login or Register') }}</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->
    <div class="page-content">
        <div class="container">
            <div class="login-popup" style="margin: 4.2rem auto 5rem;box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                    <ul class="nav nav-tabs text-uppercase" role="tablist">
                        <li class="nav-item">
                            <a href="#sign-in" class="nav-link active">{{ __('login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="#sign-up" class="nav-link">{{ __('Register') }}</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="sign-in">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email Address <span class="text-danger">*</span> </label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-0">
                                    <label for="password">Password <span class="text-danger">*</span> </label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    @error('password')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-checkbox d-flex align-items-center justify-content-between">
                                    <input type="checkbox" class="custom-checkbox" id="remember" name="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember"> {{ __('Remember Me') }}</label>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">
                                            {{ __('Last your password?') }}
                                        </a>
                                    @endif
                                </div>
                                <button style="width: 100%" type="submit" class="btn btn-primary">
                                    {{ __('Sign In') }}
                                </button>
                            </form>
                        </div>
                        <div class="tab-pane" id="sign-up">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group mb-5">
                                    <label>{{ __('Your Name') }} <span class="text-danger">*</span></label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Your Email Address') }} <span class="text-danger">*</span></label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-5">
                                    <label>{{ __('Password') }} <span class="text-danger">*</span></label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-5">
                                    <label>{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <button type="submit" class="btn btn-primary"> {{ __('Register') }} </button>
                            </form>
                        </div>
                    </div>
                    {{-- <p class="text-center">Sign in with social account</p>
                    <div class="social-icons social-icon-border-color d-flex justify-content-center">
                        <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                        <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                        <a href="#" class="social-icon social-google fab fa-google"></a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
