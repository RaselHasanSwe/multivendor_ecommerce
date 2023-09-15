@extends('layouts.master')

@section('title', 'My Account')

@section('meta')
    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description" content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
    <meta name="author" content="D-THEMES">
@endsection
@push('page-css')
    <style>
        .text-danger {
            color: #dc3545 !important;
        }
    </style>
@endpush
@php
$auth = auth()->user();
@endphp
@section('content')
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">My Account</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="demo1.html">Home</a></li>
                <li>My account</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content pt-2">
        <div class="container">
            <div class="tab tab-vertical row gutter-lg">
                <ul class="nav nav-tabs mb-6" role="tablist">
                    <li class="nav-item">
                        <a href="#account-dashboard" class="nav-link active">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="#account-orders" class="nav-link">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a href="#account-addresses" class="nav-link">Addresses</a>
                    </li>
                    <li class="nav-item">
                        <a href="#account-details" class="nav-link">Account details</a>
                    </li>
                    <li class="nav-item">
                        <a href="#wishlist" class="nav-link">Wishlist</a>
                    </li>
                    <li class="nav-item">
                        <a href="#change-password" class="nav-link">Change Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }} </a>

                    </li>
                </ul>

                <div class="tab-content mb-6">
                    {{-- @if (session('success'))
                        <div class="alert alert-success  text-capitalize" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif --}}
                    <div class="tab-pane active in" id="account-dashboard">
                        <p class="greeting">
                            Hello
                            <span class="text-dark font-weight-bold text-capitalize">{{ $auth->name }}</span>
                            (not
                            <span class="text-dark font-weight-bold text-capitalize">{{ $auth->name }}</span>?
                            <a class="text-primary" href="{{ route('logout') }}"
                                onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                {{ __('Logout') }} </a>)
                        </p>

                        <p class="mb-4">
                            From your account dashboard you can view your <a href="#account-orders"
                                class="text-primary link-to-tab">recent orders</a>,
                            manage your <a href="#account-addresses" class="text-primary link-to-tab">shipping
                                and billing
                                addresses</a>, and
                            <a href="#account-details" class="text-primary link-to-tab">edit your password and
                                account details.</a>
                        </p>

                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                <a href="#account-orders" class="link-to-tab">
                                    <div class="icon-box text-center">
                                        <span class="icon-box-icon icon-orders">
                                            <i class="w-icon-orders"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <p class="text-uppercase mb-0">Orders</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                <a href="#account-addresses" class="link-to-tab">
                                    <div class="icon-box text-center">
                                        <span class="icon-box-icon icon-address">
                                            <i class="w-icon-map-marker"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <p class="text-uppercase mb-0">Addresses</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                <a href="#account-details" class="link-to-tab">
                                    <div class="icon-box text-center">
                                        <span class="icon-box-icon icon-account">
                                            <i class="w-icon-user"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <p class="text-uppercase mb-0">Account Details</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                <a href="#wishlist" class="link-to-tab">
                                    <div class="icon-box text-center">
                                        <span class="icon-box-icon icon-wishlist">
                                            <i class="w-icon-heart"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <p class="text-uppercase mb-0">Wishlist</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <div class="icon-box text-center">
                                        <span class="icon-box-icon icon-logout">
                                            <i class="w-icon-logout"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <p class="text-uppercase mb-0">Logout</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane mb-4" id="account-orders">
                        <div class="icon-box icon-box-side icon-box-light">
                            <span class="icon-box-icon icon-orders">
                                <i class="w-icon-orders"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title text-capitalize ls-normal mb-0">Orders</h4>
                            </div>
                        </div>

                        <table class="shop-table account-orders-table mb-6">
                            <thead>
                                <tr>
                                    <th class="order-id">Order</th>
                                    <th class="order-date">Date</th>
                                    <th class="order-status">Status</th>
                                    <th class="order-total">Total</th>
                                    <th class="order-actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($orders) > 0)
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td class="order-id">#{{ $order->order_id }}</td>
                                            <td class="order-date">{{ date('d-M-Y', strtotime( $order->created_at)) }}</td>
                                            <td class="order-status">Processing</td>
                                            <td class="order-total">
                                                <span class="order-price">${{ $order->total}}</span> for
                                                <span class="order-quantity">{{ count($order->orderedProducts) }}</span> item
                                            </td>
                                            {{-- <td class="wishlist-action">
                                                <div class="d-lg-flex">
                                                    <a href="#"
                                                        class="btn btn-quickview btn-outline btn-default btn-rounded btn-sm mb-2 mb-lg-0">Quick
                                                        View</a>
                                                    <a href="#" class="btn btn-dark btn-rounded btn-sm ml-lg-2 btn-cart">Add to
                                                        cart</a>
                                                </div>
                                            </td> --}}
                                            <td class="order-action">
                                                <a href="{{ route('order.show',$order->id) }}" class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                                <a href="{{ route('user.order.pdf',$order->id) }}" class="btn btn-outline btn-danger btn-block btn-sm btn-rounded">PDF</a>
                                            </td>
                                        </tr>        
                                    @endforeach
                                    
                                @endif
                            </tbody>
                        </table>

                        <a href="{{ url('/') }}" class="btn btn-dark btn-rounded btn-icon-right">Go
                            Shop<i class="w-icon-long-arrow-right"></i></a>
                    </div>

                    <div class="tab-pane" id="account-addresses">
                        <p>NB: The following addresses will be used on the checkout page by default.</p>
                        <div class="row">
                            <div class="col-sm-12 mb-6">
                                <div class="ecommerce-address billing-address pr-lg-8">
                                    <h4 class="title title-underline ls-25 font-weight-bold"> Address</h4>
                                    <form class="form" id="colorForm" method="post" action="{{ route('user.billing.address.save') }}">
                                       @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="first_name">First Name</label>
                                                    <input type="text" id="first_name" name="first_name" value="{{ $billings->first_name ?? '' }}" class="form-control form-control-md text-capitalize">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="last_name">Last Name</label>
                                                    <input type="text" id="last_name" name="last_name" value="{{ $billings->last_name ?? '' }}" class="form-control form-control-md text-capitalize">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email Address </label>
                                                    <input type="text" value="{{ $billings->email ?? '' }}" id="email" name="email" class="form-control form-control-md">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone">Phone </label>
                                                    <input type="text" value="{{ $billings->phone ?? '' }}" id="phone" name="phone" class="form-control form-control-md">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mobile">Mobile </label>
                                                    <input type="text" value="{{$billings->mobile ?? '' }}" id="mobile" name="mobile" class="form-control form-control-md">
                                                </div>
                                            </div>
            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="country">Country <span class="text-danger">*</span></label>
                                                    <select class="form-control" name="country" id="country"> 
                                                        <option selected value="United States">United States</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="state">State <span class="text-danger">*</span></label>
                                                    <select class="form-control" name="state" id="state">
                                                        <option selected value="" disabled>--Select State--</option>
                                                        @foreach ($states as $state)
                                                            <option {{ $state->name == @$billings->state ?? 'selected' }} value="{{ $state->name }}">{{ $state->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="city">city </label>
                                                    <input type="text" value="{{ $billings->city ?? '' }}" id="city" name="city" class="form-control form-control-md">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="zip">Zip Code </label>
                                                    <input type="text" value="{{ $billings->zip ?? '' }}" id="zip" name="zip" class="form-control form-control-md">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="address">Address </label>
                                                    <textarea id="address" name="address" class="form-control form-control-md" cols="30" rows="4">{{ $billings->address ?? '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
                                    </form>
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="account-details">
                        <div class="icon-box icon-box-side icon-box-light">
                            <span class="icon-box-icon icon-account mr-2">
                                <i class="w-icon-user"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title mb-0 ls-normal">Account Details</h4>
                            </div>
                        </div>
                        <form class="form account-details-form" action="{{ route('user.update') }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input readonly type="text" id="firstname" name="name"
                                            value="{{ $auth->name }}"
                                            class="form-control form-control-md text-capitalize">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email_address">Email Address </label>
                                        <input readonly type="text" value="{{ $auth->email }}" id="email_address"
                                            name="email" class="form-control form-control-md">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone </label>
                                        <input readonly type="text" value="{{ $auth->phone }}" id="phone"
                                            name="phone" class="form-control form-control-md">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Mobile </label>
                                        <input readonly type="text" value="{{ $auth->mobile }}" id="mobile"
                                            name="mobile" class="form-control form-control-md">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country_id">Country <span class="text-danger">*</span></label>
                                        <select class="form-control" name="country_id" id="country_id">
                                            <option selected value="183">United States</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="state_id">State <span class="text-danger">*</span></label>
                                        <select class="form-control" name="state_id" id="state_id">
                                            <option selected value="" disabled hidden>--Select State--</option>
                                            @foreach ($states as $state)
                                                <option {{ $auth->state_id == $state->id ?? 'selected' }}
                                                    value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">city </label>
                                        <input type="text" value="{{ $auth->city }}" id="city" name="city"
                                            class="form-control form-control-md">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="zip_code">Zip Code </label>
                                        <input type="text" value="{{ $auth->zip_code }}" id="zip_code"
                                            name="zip_code" class="form-control form-control-md">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">Address </label>
                                        <textarea id="address" name="address" class="form-control form-control-md" cols="30" rows="4">{{ $auth->address }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">UPDATE</button>
                        </form>
                    </div>

                    <div class="tab-pane" id="wishlist">
                        <h3 class="wishlist-title">My wishlist</h3>
                        <table class="shop-table wishlist-table ">
                            <thead>
                                <tr>
                                    <th class="product-name"><span>Photo</span></th>
                                    <th><span>Product Name</span></th>
                                    <th class="product-price"><span>Price</span></th>
                                    <th class="product-stock-status"><span>Stock Status</span></th>
                                    <th class="wishlist-action">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($wishlist) > 0)
                                    @foreach ($wishlist as $item)
                                        <tr id="delteTrId-{{ $item->id }}">
                                            <td class="product-thumbnail">
                                                <div class="p-relative">
                                                    <a href="{{ url($item->product->slug->slug) }}">
                                                        <figure>
                                                            <img src="{{ asset(ImageHelper::URI['product_cover_img'].$item->product->cover_image) }}" alt="product" width="300"
                                                                height="338">
                                                        </figure>
                                                    </a>
                                                    <button type="submit" onclick="deleteWishlist({{$item->id}})" class="btn btn-close"><i class="fas fa-times"></i></button>
                                                </div>
                                            </td>
                                            <td class="product-name">
                                                <a href="{{ url($item->product->slug->slug) }}">
                                                    {{ $item->product->product_name}}
                                                </a>
                                            </td>
                                            <td class="product-price">
                                                <ins class="new-price">${{ ProductHelper::discount($item->product) }}</ins>
                                            </td>
                                            <td class="product-stock-status">
                                                <span class="wishlist-in-stock">{{ $item->product->stock > 0 ? "In Stock" : "Out of stock" }}</span>
                                            </td>
                                            <td class="wishlist-action">
                                                <div class="d-lg-flex">
                                                    <a href="{{ count($item->product->colors) && count($item->product->sizes) ? url($item->product->slug->slug) : 'javascript:void(0);' }}"  class="btn btn-dark btn-rounded btn-sm ml-lg-2 btn-cart"
                                                        title="Add to cart" {{ !count($item->product->colors) && !count($item->product->sizes) ? "onclick=directCart(".$item->product->id.",".$item->product->seller->id.")" : ""}}>Addd to cart</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="toolbox toolbox-pagination justify-content-between">
                            <ul class="pagination">
                            </ul>
                            {{ $wishlist->links() }}
            
                        </div>
                    </div>

                    <div class="tab-pane" id="change-password">
                        <form class="form account-details-form" action="{{ route('user.change_password') }} "
                            method="post">
                            @csrf
                            @method('put')
                            <h4 class=" mt-5 title title-password ls-25 font-weight-bold">Password change</h4>
                            <div class="form-group">
                                <label class="text-dark" for="current_password">Current Password <span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control form-control-md" id="current_password"
                                    name="current_password">
                                @error('current_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="password">New Password <span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control form-control-md" id="password"
                                    name="password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-10">
                                <label class="text-dark" for="password_confirmation">Confirm Password <span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control form-control-md" id="password_confirmation"
                                    name="password_confirmation">
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- End of PageContent -->


@endsection

@push('css')
    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/assets/vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendor/animate/animate.min.css') }}">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/assets/vendor/magnific-popup/magnific-popup.min.css') }}">
    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.min.css') }}">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Poppins:400,500,600,700" media="all">
@endpush

@push('js')
    <!-- Plugin JS File -->

    <script src="{{ asset('frontend/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/webfont.js') }}"></script>
    <!-- Webfront JS File -->
    <script src="{{ asset('frontend/assets/js/webfont.js') }}" async=""></script>
@endpush


