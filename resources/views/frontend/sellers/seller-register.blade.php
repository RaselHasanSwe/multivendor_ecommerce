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
                <li>Seller Register</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content">
        <div class="container">
            <main class="main login-page">
                <div class="login-popup" style="max-width: 75rem">
                    @if ( Session::has('danger') )
                        <div class="alert alert-warning mb-4" role="alert">
                            {{ Session::get('danger') }}
                        </div>
                    @endif

                    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                        <ul class="nav nav-tabs text-uppercase" role="tablist">
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link active">Seller/Vendor Sign up</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-3">
                            <form class="form contact-us-form" action="{{ route('seller.register.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="username">Owner/Contact Person Full Name</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="username" for="store_name">Store/Company Name</label>
                                <input type="text" id="store_name" name="store_name"
                                    class="form-control" value="{{ old('store_name') }}">
                            </div>
                            <div class="form-group">
                                <label for="username" for="store_name">Store/Company Website/Social Link (if any)</label>
                                <input type="url" id="store_social_link" name="store_social_link"
                                    class="form-control" value="{{ old('store_social_link') }}">
                            </div>
                            <div class="form-group">
                                <label for="username" for="phone">Phone No.</label>
                                <input type="text" id="phone" name="phone"
                                    class="form-control" value="{{ old('phone') }}">
                            </div>
                            <div class="form-group">
                                <label for="username" for="mobile">Mobile No.</label>
                                <input type="text" id="mobile" name="mobile"
                                    class="form-control" value="{{ old('mobile') }}">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea id="address" name="address" cols="30" rows="3"
                                    class="form-control">{{ old('address') }}</textarea>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="username" for="city">City</label>
                                    <input type="text" id="city" name="city"
                                        class="form-control" value="{{ old('city') }}">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="username" for="state_id">State</label>
                                    <select class="form-control" name="state_id" id="state_id">
                                        <option value="" selected> Select State </option>
                                        @if ( $states->count() > 0)
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="username" for="zip_code">Zip Code</label>
                                    <input type="text" id="zip_code" name="zip_code"
                                        class="form-control" value="{{ old('zip_code') }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="username" for="country_id">Country</label>
                                    <select class="form-control" name="country_id" id="country_id">
                                        <option value="" selected>Select Country</option>
                                        @if ( $countries->count() > 0)
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email ">E-mail Address</label>
                                <input type="email" id="email " name="email"
                                    class="form-control" value="{{ old('email') }}">
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="username" for="username">Username</label>
                                    <input type="text" id="username" name="username"
                                        class="form-control" value="{{ old('username') }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="username" for="password">Password</label>
                                    <input type="password" id="password" name="password"
                                        class="form-control">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="username" for="password_confirmation">Confirm Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="mt-2 d-flex justify-content-end">
                                <a class="btn btn-dark btn-rounded mr-2" href="{{ route('seller.login') }}"> Back to Login </a>
                                <button type="submit" class="btn btn-dark btn-rounded">Sign Up</button>
                            </div>
                        </form>
                        @if ( Session::has('success') )
                            <div class="alert alert-success mt-4" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
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
