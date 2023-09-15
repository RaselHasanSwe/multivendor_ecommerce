@extends('layouts.master')

@section('title', 'Vendor Register')

@section('meta')
    <meta name="keywords" content="" />
    <meta name="description"content="">
    <meta name="author" content="">
@endsection

@section('content')
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav mb-10 pb-1">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Seller Password Reset</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content">
        <div class="container">
            <main class="main login-page">
                <div class="login-popup" style="max-width: 55rem">
                    @if (session('status'))
                        <div class="alert alert-success mt-4" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                        <ul class="nav nav-tabs text-uppercase" role="tablist">
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link active">Password Reset</a>
                            </li>
                        </ul>
                        <div class="tab-content">

                            <form method="post" action="{{ route('seller.password.email') }}" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group mt-4">
                                         <input class="form-control" type="email"  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Email*" autofocus />

                                        @error('email')
                                            <span class="invalid-feedback text-color-red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3"><button type="submit" class="btn btn-primary">{{ __('Send Password Reset Link') }}</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <!-- End of Contact Section -->
        </div>
    </div>
    <!-- End of PageContent -->
@endsection

@push('js')
    <!-- Plugin JS File -->
    <script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
@endpush
@push('page-scripts')

@endpush
