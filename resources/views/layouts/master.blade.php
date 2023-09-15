<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_token" content="{{ csrf_token() }}">
    <title> @yield('title')</title>
    @yield('meta')

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('frontend/assets/images/icons/favicon.png') }}">

    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: { families: ['Poppins:400,500,600,700,800'] }
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = '{{asset('frontend/assets/js/webfont.js')}}';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <link rel="preload" href="{{ asset('frontend/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2') }}" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{ asset('frontend/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2') }}" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{ asset('frontend/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2') }}" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{ asset('frontend/assets/fonts/wolmart.woff?png09e" as="font" type="font/woff') }}" as="font" crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendor/fontawesome-free/css/all.min.css') }}">

    <!-- Swiper's CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.css') }}">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/photoswipe/photoswipe.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/photoswipe/default-skin/default-skin.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendor/animate/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendor/magnific-popup/magnific-popup.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/extensions/toastr.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    @stack('css')

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/demo3.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/home-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/extensions/toastr.css') }}">

    @stack('page-css')
    <style>
        .color-active{
            border: 2px solid red !important;
        }
    </style>

</head>

<body class="{{Request()->is('/')? 'home' : ''}}">
    <div class="page-wrapper">
        <h1 class="d-none">Wolmart - Responsive Marketplace HTML Template</h1>
        <!-- Start of Header -->
        <header class="header">

            @include('frontend.partials.header-top')
            <!-- End of Header Top -->

            @include('frontend.partials.header-middle')
            <!-- End of Header Middle -->

            @include('frontend.partials.header-bottom')

        </header>
        <!-- End of Header -->

        <!-- Start of Main-->
        <main class="main">
            @yield('content')
            <!--End of Catainer -->
        </main>
        <!-- End of Main -->

        <!-- Start of Footer -->
        <footer class="footer">
            @include('frontend.partials.subcribe-newwlater')

            <div class="container">
                @include('frontend.partials.footer-top')
                {{-- @include('frontend.partials.footer-middle')
                @include('frontend.partials.footer-copywrite') --}}
            </div>
        </footer>
        <!-- End of Footer -->
    </div>
    <!-- End of Page-wrapper-->

    <!-- Start of Sticky Footer -->
    @include('frontend.partials.sticky-footer')
    <!-- End of Sticky Footer -->

    <!-- Start of Scroll Top -->
    @include('frontend.partials.scroll-top')
    <!-- End of Scroll Top -->

    <!-- Start of Mobile Menu -->
    @include('frontend.partials.mobile-menu')
    <!-- End of Mobile Menu -->

    <!-- Start of Newsletter popup -->

    </div>
    <!-- End of Newsletter popup -->
    @include('frontend.partials.newslater-popup')
    <!-- Start of Quick View -->
    @include('frontend.partials.single-product-popup')
    <!-- End of Quick view -->
    <script src="{{ asset('frontend/assets/vendor/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/zoom/jquery.zoom.js') }}"></script>


    <script src="{{ asset('admin/app-assets/js/scripts/extensions/toastr.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>

    @stack('js')

    <!-- Main JS -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

    <!-- Swiper JS -->



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    <script src="{{ asset('admin/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/bijoytechJs/ajax.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/moshiur.bijoytech.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/sahadat.bijoytech.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/sajib.bijoytech.js') }}"></script>
    <script src="{{asset('admin/app-assets/bijoytechJs/rakib.bijoytech.js')}}"></script>

    @stack('page-scripts')


    <script>
        window.base_url           = '<?= url("/") ?>';
        window.token              = '<?= csrf_token(); ?>';
        window.add_to_cart        = '<?= route('cart.add') ?>';
        window.add_to_wishlist    = '<?= route('wishlist.add') ?>';
        window.delete_to_wishlist = '<?= route('wishlist.delete') ?>';
        window.delete_cart_item   = '<?= route('cart.item.delete') ?>';
        window.update_cart        = '<?= route('cart.update') ?>';
        window.destroy_cart       = '<?= route('cart.destroy') ?>';
    </script>

    @if (Session::has('success'))
        <script>
            toastr.success('{{ Session::get('success')}}');
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            toastr.error('{{ Session::get('error')}}');
        </script>
    @endif

</body>

</html>
