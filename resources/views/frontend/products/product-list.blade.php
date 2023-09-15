@extends('layouts.master')

@section('title', 'Product List')

@section('meta')
    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description"content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
    <meta name="author" content="D-THEMES">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb bb-no">
                <li><a href="demo1.html">Home</a></li>
                <li>Shop</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content">
        <div class="container">
            <!-- Start of Shop Content -->
            <div class="shop-content row gutter-lg mb-10">
                <!-- Start of Sidebar, Shop Sidebar -->
                <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
                    <!-- Start of Sidebar Overlay -->
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

                    <!-- Start of Sidebar Content -->
                    @include('frontend.products.fillter')
                    <!-- End of Sidebar Content -->
                </aside>
                <!-- End of Shop Sidebar -->

                <!-- Start of Shop Main Content -->
                <div class="main-content">
                    <nav class="toolbox sticky-toolbox sticky-content fix-top">
                        <div class="toolbox-left">
                            <a href="#"
                                class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle
                                btn-icon-left d-block d-lg-none"><i
                                    class="w-icon-category"></i><span>Filters</span></a>
                            <div class="toolbox-item toolbox-sort select-box text-dark">
                                <label>Sort By :</label>
                                <select name="orderby" id="sortBy" class="form-control">
                                    <option value="default" selected="selected">Default sorting</option>
                                    <option value="asc" selected="selected">Ascending</option>
                                    <option value="desc" selected="selected">Descending</option>
                                    {{-- <option value="popularity">Sort by popularity</option>
                                    <option value="rating">Sort by average rating</option>
                                    <option value="date">Sort by latest</option>
                                    <option value="price-low">Sort by pric: low to high</option>
                                    <option value="price-high">Sort by price: high to low</option> --}}
                                </select>
                            </div>
                        </div>
                    </nav>
                    <div class="product-wrapper row cols-md-3 cols-sm-2 cols-2">
                        @if (count($products) > 0)
                            @foreach ($products as $product)
                                @include('frontend.products.product', ['product' => $product])
                            @endforeach
                        @endif
                    </div>

                    <div class="toolbox toolbox-pagination justify-content-between">
                        {{-- <p class="showing-info mb-2 mb-sm-0">
                            Showing<span>1-12 of 60</span>Products
                        </p> --}}
                        <ul class="pagination">
                            {{-- <li class="prev disabled">
                                <a href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                    <i class="w-icon-long-arrow-left"></i>Prev
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="next">
                                <a href="#" aria-label="Next">
                                    Next<i class="w-icon-long-arrow-right"></i>
                                </a>
                            </li> --}}


                        </ul>

                        {{ $products->links() }}

                    </div>
                </div>
                <!-- End of Shop Main Content -->
            </div>
            <!-- End of Shop Content -->
        </div>
    </div>
    <!-- End of Page Content -->

    <form id="sortingForm">

    </form>
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

    <script></script>
@endpush
