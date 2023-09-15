@extends('layouts.master')

@section('title', 'Privacy Policy')

@section('meta')
    <meta name="keywords" content="" />
    <meta name="description"content="">
    <meta name="author" content="">
@endsection

@section('content')
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">Privacy Policy</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav mb-10 pb-0">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li>Privacy Policy</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->
    
    <!-- Start of Page Content -->
    <div class="page-content">
        <div class="container">
            <section class="boost-section pt-0 pb-10">
                <div class="container mt-0 mb-9">
                    <div class="row align-items-center mb-10">
                        <div class="col-md-12 pl-lg-12 mb-8">
                            <h4 class="title text-left">{{ $pageData['title'] }}</h4>
                            
                            <div class="common-description">
                                {!! $pageData['description'] !!}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@push('js')
    <!-- Plugin JS File -->
    <script src="{{ asset('frontend/assets/vendor/jquery.count-to/jquery.count-to.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
@endpush