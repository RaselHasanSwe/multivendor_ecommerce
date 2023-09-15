{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
@extends('layouts.master')
@section('title', 'Confirm Password')
@push('page-css')
    <style>
        .text-danger {
            color: #dc3545 !important;
        }

        .text-info {
            color: #17a2b8 !important;
        }

        .text-primary {
            color: #007bff !important;
        }
    </style>
@endpush
@section('content')
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0"> {{ __('Verify Email Address') }}</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li> {{ __('Verify Email Address') }}</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->
    <div class="page-content">
        <div class="container">
            <div class="login-popup" style="margin: 4.2rem auto 5rem;box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
                <div class="py-3">
                    <p class="text-info"> {{ __('Before proceeding, please check your email for a verification link.') }}
                    </p>
                    <p class="text-primary">{{ __('If you did not receive the email') }},</p>

                </div>
                {{-- <form method="POST" action="{{ route('verification.resend') }}"> --}}
                @csrf
                <button style="width: 100%" type="submit" class="btn btn-primary">
                    {{ __('click here to request another') }}
                </button>

                </form>
            </div>
        </div>
    </div>
@endsection
