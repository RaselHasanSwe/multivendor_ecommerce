@extends('layouts.master')

@section('title', 'Bijoytech Home')

@section('meta')
<meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
<meta name="description" content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
<meta name="author" content="D-THEMES">
@endsection

@push('css')

@endpush

@push('page-css')

@endpush

@section('content')
<section class="intro-section">
    <div class="swiper-container swiper-theme nav-inner pg-inner swiper-nav-lg animation-slider pg-xxl-hide nav-xxl-show nav-hide"
        data-swiper-options="{
            'slidesPerView': 1,
            'autoplay': {
                'delay': 8000,
                'disableOnInteraction': false,
                'loop':true
            }
        }">
        <div class="swiper-wrapper">
            <div class="swiper-slide banner banner-fixed intro-slide intro-slide1"
                style="background-image: url( {{ asset('frontend/assets/images/demos/demo1/sliders/Banner-1.jpg') }} );background-position: center; background-repeat: no-repeat; background-size: cover; background-color: #ebeef2;">
                {{-- <div class="container">
                        <figure class="slide-image skrollable slide-animate">
                            <img src="{{ asset('frontend/assets/images/demos/demo1/sliders/Banner-1.jpg') }}"
                alt="Banner"
                data-bottom-top="transform: translateY(10vh);"
                data-top-bottom="transform: translateY(-10vh);" width="474" height="397">
                </figure>
                <div class="banner-content y-50 text-right">
                    <h5 class="banner-subtitle font-weight-normal text-default ls-50 lh-1 mb-2 slide-animate"
                        data-animation-options="{
                            'name': 'fadeInRightShorter',
                            'duration': '1s',
                            'delay': '.2s'
                        }">
                        Custom <span class="p-relative d-inline-block">Men’s</span>
                    </h5>
                    <h3 class="banner-title font-weight-bolder ls-25 lh-1 slide-animate" data-animation-options="{
                            'name': 'fadeInRightShorter',
                            'duration': '1s',
                            'delay': '.4s'
                        }">
                        RUNNING SHOES
                    </h3>
                    <p class="font-weight-normal text-default slide-animate" data-animation-options="{
                            'name': 'fadeInRightShorter',
                            'duration': '1s',
                            'delay': '.6s'
                        }">
                        Sale up to <span class="font-weight-bolder text-secondary">30% OFF</span>
                    </p>

                    <a href="shop-list.html" class="btn btn-dark btn-outline btn-rounded btn-icon-right slide-animate"
                        data-animation-options="{
                            'name': 'fadeInRightShorter',
                            'duration': '1s',
                            'delay': '.8s'
                        }">SHOP NOW<i class="w-icon-long-arrow-right"></i></a>

                </div>
                <!-- End of .banner-content -->
            </div> --}}
            <!-- End of .container -->
        </div>
        <!-- End of .intro-slide1 -->

        <div class="swiper-slide banner banner-fixed intro-slide intro-slide2"
            style="background-image: url( {{ asset('frontend/assets/images/demos/demo1/sliders/Banner-2.jpg') }} );background-position: center; background-repeat: no-repeat; background-size: cover;  background-color: #ebeef2;">

        </div>
        <!-- End of .intro-slide2 -->

        <div class="swiper-slide banner banner-fixed intro-slide intro-slide3"
            style="background-image: url( {{ asset('frontend/assets/images/demos/demo1/sliders/Banner-3.jpg') }} );background-position: center; background-repeat: no-repeat; background-size: cover;  background-color: #f0f1f2;">

        </div>
        <!-- End of .intro-slide3 -->
    </div>
    <div class="swiper-pagination"></div>
    <button class="swiper-button-next"></button>
    <button class="swiper-button-prev"></button>
    </div>
    <!-- End of .swiper-container -->
</section>
<!-- End of .intro-section -->


<!--START CATEGORYWISE PRODUCT VIEW-->
<section class="swiper product-section">


    <div>
        <h3 class="float-left"> Fasion: Men's Fasion</h3>
        <h3 class="float-right">
            <a href="#" class="btn">More Products</a>
        </h3>
    </div>
    <hr>
    <div class="swiper-wrapper">
        @foreach ($pageData as $item)
        <div class="swiper-slide">
            <div class="product text-center">
                <figure class="product-media">
                    <a href="product-default.html">
                        <img src="{{asset('frontend/assets/images/shop/product1.webp')}}" alt="Product" width="300"
                            height="338" />
                    </a>
                    <div class="product-action-horizontal">
                        <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="Add to cart"></a>
                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart" title="Wishlist"></a>
                        <a href="#" class="btn-product-icon btn-compare w-icon-compare" title="Compare"></a>
                        <a href="#" class="btn-product-icon btn-quickview w-icon-search" title="Quick View"></a>
                    </div>
                </figure>
                <div class="product-details">
                    <div class="product-cat">
                        <a href="shop-banner-sidebar.html">{{$item->name}}</a>
                    </div>
                    <h3 class="product-name">
                        <a href="product-default.html">{{$item->icon}}</a>
                    </h3>
                    <div class="ratings-container">
                        <div class="ratings-full">
                            <span class="ratings" style="width: 60%;"></span>
                            <span class="tooltiptext tooltip-top"></span>
                        </div>
                        <a href="product-default.html" class="rating-reviews">(7 reviews)</a>
                    </div>
                    <div class="product-pa-wrapper">
                        <div class="product-price">
                            $15.00
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</section>
<!--END CATEGORYWISE PRODUCT VIEW-->
@endsection

@push('js')
<!-- Plugin JS File -->
<script src="{{ asset('frontend/assets/vendor/jquery.plugin/jquery.plugin.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/zoom/jquery.zoom.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/jquery.countdown/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/skrollr/skrollr.min.js') }}"></script>

<!-- Swiper JS -->
<script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
@endpush
@push('page-scripts')
<script>
    var swiper = new Swiper(".product-section", {
        slidesPerView: 6,
        spaceBetween: 30,
        slidesPerGroup: 1,
        loop: true,
        loopFillGroupWithBlank: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        autoplay: {
            delay: 3000,
        },
    });

</script>
@endpush
