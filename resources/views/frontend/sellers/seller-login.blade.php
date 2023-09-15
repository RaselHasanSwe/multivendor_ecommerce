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
                <li>Seller Login</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content">
        <div class="container">
            <main class="main login-page">
                <div class="login-popup" style="max-width: 52rem">
                    @if ( Session::has('danger') )
                        <div class="alert alert-warning mb-4" role="alert">
                            {{ Session::get('danger') }}
                        </div>
                    @endif

                    @if ( Session::has('success') )
                        <div class="alert alert-success mb-4" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                        <ul class="nav nav-tabs text-uppercase" role="tablist">
                            <li class="nav-item">
                                <a href="#sign-in" class="nav-link active">Seller / Vendor Login</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <form method="post" action="{{ route('seller.login.check') }}" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group mt-4">
                                        <label>Email*</label>
                                        <input type="email" class="form-control" name="email" id="email" required>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Password *</label>
                                        <input type="password" class="form-control" name="password" id="password" required>
                                    </div>

                                    <div class="form-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-checkbox" id="remember1" name="remember" value="1">
                                        <label for="remember1">Remember me</label>
                                        <a href="{{ route('seller.password.request') }}">Last your password?</a>
                                    </div>

                                    <div class="mb-3"><button type="submit" class="btn btn-primary">Sign In</button></div>
                                </div>
                            </form>
                        </div>
                        <p class="text-center">Sign in with social account</p>

                        <div class="social-icons social-icon-border-color d-flex justify-content-center">
                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                            <a href="#" class="social-icon social-google fab fa-google"></a>
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
