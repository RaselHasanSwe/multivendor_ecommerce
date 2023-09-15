@extends('layouts.master')

@section('title', 'Product Details')

@section('meta')
    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description"content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
    <meta name="author" content="D-THEMES">
@endsection

@section('content')

<!-- Start of Breadcrumb -->
<nav class="breadcrumb-nav mb-10 pb-0">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li>Product Details</li>
        </ul>
    </div>
</nav>
<!-- End of Breadcrumb -->
<div class="page-content">
    <div class="container">
        <div class="row gutter-lg">
            <div class="main-content">
                <div class="product product-single row">
                   @include('frontend.product-details.product-images')

                   @include('frontend.product-details.product-info')
                </div>

                @include('frontend.product-details.additonal-info')

                @include('frontend.product-details.more-product')

                @include('frontend.product-details.related-product')
            </div>
            <!-- End of Main Content -->
            @include('frontend.product-details.sidebar')
            <!-- End of Sidebar -->
        </div>
    </div>
</div>
@endsection

@push('css')
     <!-- Vendor CSS -->
     <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendor/fontawesome-free/css/all.min.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendor/animate/animate.min.css') }}">

     <!-- Plugin CSS -->
     <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.css') }}">
     <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/nouislider/nouislider.min.css') }}">
     <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/magnific-popup/magnific-popup.min.css') }}">
@endpush
@push('js')
    <!-- Plugin JS File -->
    <script src="{{ asset('frontend/assets/vendor/sticky/sticky.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/jquery.plugin/jquery.plugin.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/jquery.countdown/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/zoom/jquery.zoom.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/photoswipe/photoswipe.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/photoswipe/photoswipe-ui-default.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
@endpush
