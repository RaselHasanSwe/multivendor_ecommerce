@extends('layouts.master')

@section('title', 'Checkout')

@section('meta')
    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description"content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
    <meta name="author" content="D-THEMES">
@endsection
@push('page-css')
    <style>
        .text-danger {
            color: #dc3545 !important;
        }
    </style>
@endpush
@section('content')
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
                <li class="passed"><a href="cart.html">Shopping Cart</a></li>
                <li class="active"><a href="checkout.html">Checkout</a></li>
                <li><a href="order.html">Order Complete</a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content">
        <div class="container">
            @guest
                @include('frontend.billing.login-form')
            @endguest
            <form class="form checkout-form mt-5" action="{{ route('payment') }}" id="billingForm" method="post">
                @csrf
                <div class="row mb-9">
                    @include('frontend.billing.billing')
                    @include('frontend.billing.order')
               
                </div>
            </form>
        </div>
    </div>
    <!-- End of PageContent -->
@endsection

@push('js')
    <!-- Plugin JS File -->
    <script src="{{ asset('frontend/assets/vendor/sticky/sticky.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
@endpush
