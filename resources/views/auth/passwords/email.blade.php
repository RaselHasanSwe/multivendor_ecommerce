@extends('layouts.master')
@section('title', 'Send Reset Link')
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
            <h1 class="page-title mb-0">{{ __('Send Password Reset Link') }}</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li>{{ __('Send Password Reset Link') }}</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->
    <div class="page-content">
        <div class="container">
            <div class="login-popup" style="margin: 4.2rem auto 5rem;box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">{{ __('Email Address') }} <span class="text-danger">*</span> </label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button style="width: 100%" type="submit" class="btn btn-primary">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
