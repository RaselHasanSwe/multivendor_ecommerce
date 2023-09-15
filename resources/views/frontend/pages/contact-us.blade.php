@extends('layouts.master')

@section('title', 'Contact Us')

@section('meta')
<meta name="keywords" content="" />
<meta name="description" content="">
<meta name="author" content="">
@endsection

@section('content')
<!-- Start of Page Header -->
<div class="page-header">
    <div class="container">
        <h1 class="page-title mb-0">Contact Us</h1>
    </div>
</div>
<!-- End of Page Header -->

<!-- Start of Breadcrumb -->
<nav class="breadcrumb-nav mb-10 pb-1">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="demo1.html">Home</a></li>
            <li>Contact Us</li>
        </ul>
    </div>
</nav>
<!-- End of Breadcrumb -->

<!-- Start of PageContent -->
<div class="page-content contact-us">
    <div class="container">
        <section class="content-title-section mb-10">
            <h3 class="title title-center mb-3">Contact
                Information
            </h3>
            <p class="text-center">Lorem ipsum dolor sit amet,
                consectetur
                adipiscing elit, sed do eiusmod tempor incididunt ut</p>
        </section>
        <!-- End of Contact Title Section -->

        <section class="contact-information-section mb-10">
            <div class=" swiper-container swiper-theme " data-swiper-options="{
                    'spaceBetween': 20,
                    'slidesPerView': 1,
                    'breakpoints': {
                        '480': {
                            'slidesPerView': 2
                        },
                        '768': {
                            'slidesPerView': 3
                        },
                        '992': {
                            'slidesPerView': 4
                        }
                    }
                }">
                <div class="swiper-wrapper row cols-xl-4 cols-md-3 cols-sm-2 cols-1">
                    <div class="swiper-slide icon-box text-center icon-box-primary">
                        <span class="icon-box-icon icon-email">
                            <i class="w-icon-envelop-closed"></i>
                        </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title">E-mail Address</h4>
                            <p>mail@example.com</p>
                        </div>
                    </div>
                    <div class="swiper-slide icon-box text-center icon-box-primary">
                        <span class="icon-box-icon icon-headphone">
                            <i class="w-icon-headphone"></i>
                        </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title">Phone Number</h4>
                            <p>(123) 456-7890 / (123) 456-9870</p>
                        </div>
                    </div>
                    <div class="swiper-slide icon-box text-center icon-box-primary">
                        <span class="icon-box-icon icon-map-marker">
                            <i class="w-icon-map-marker"></i>
                        </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title">Address</h4>
                            <p>Lawrence, NY 11345, USA</p>
                        </div>
                    </div>
                    <div class="swiper-slide icon-box text-center icon-box-primary">
                        <span class="icon-box-icon icon-fax">
                            <i class="w-icon-fax"></i>
                        </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title">Fax</h4>
                            <p>1-800-570-7777</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Contact Information section -->

        <hr class="divider mb-10 pb-1">

        <section class="contact-section">
            <div class="row gutter-lg pb-3">
                <div class="col-lg-6 mb-8">
                    <h4 class="title mb-3">People usually ask these</h4>
                    <div class="accordion accordion-bg accordion-gutter-md accordion-border">
                        <div class="card">
                            <div class="card-header">
                                <a href="#collapse1" class="collapse">How can I cancel my order?</a>
                            </div>
                            <div id="collapse1" class="card-body expanded">
                                <p class="mb-0">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp orincid
                                    idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu
                                    sceler
                                    isque felis. Vel pretium.
                                </p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <a href="#collapse2" class="expand">Why is my registration delayed?</a>
                            </div>
                            <div id="collapse2" class="card-body collapsed">
                                <p class="mb-0">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp orincid
                                    idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu
                                    sceler
                                    isque felis. Vel pretium.
                                </p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <a href="#collapse3" class="expand">What do I need to buy products?</a>
                            </div>
                            <div id="collapse3" class="card-body collapsed">
                                <p class="mb-0">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp orincid
                                    idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu
                                    sceler
                                    isque felis. Vel pretium.
                                </p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <a href="#collapse4" class="expand">How can I track an order?</a>
                            </div>
                            <div id="collapse4" class="card-body collapsed">
                                <p class="mb-0">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp orincid
                                    idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu
                                    sceler
                                    isque felis. Vel pretium.
                                </p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <a href="#collapse5" class="expand">How can I get money back?</a>
                            </div>
                            <div id="collapse5" class="card-body collapsed">
                                <p class="mb-0">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    temp orincid idunt ut labore et dolore magna aliqua. Venenatis tellus in
                                    metus vulp utate eu sceler isque felis. Vel pretium.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-8">
                    <h4 class="title mb-3">Send Us a Message</h4>
                    <form class="form contact-us-form" id="contactForm" action="{{route("admin.contact.view")}}"
                        method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" id="name" name="name" class="form-control">
                            
                        </div>

                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <input type="email" id="email" name="email" class="form-control">
                           
                        </div>
                        <div class="form-group">
                            <label for="description">Your Message</label>
                            <textarea id="description" name="description" cols="30" rows="5" class="form-control"></textarea>
                            
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-dark btn-rounded">Send Now</button>
                        </div>

                    </form>
                </div>
            </div>
        </section>
        <!-- End of Contact Section -->
    </div>

    <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
    <div class="google-map contact-google-map" id="googlemaps"></div>
    <!-- End Map Section -->
</div>
<!-- End of PageContent -->
@endsection

@push('js')
<!-- Plugin JS File -->
<script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('admin/app-assets/vendors/js/forms/validation/jquery.validate.min.jS') }}"></script>
<script src="{{asset('frontend/assets/vendor/zoom/jquery.zoom.js')}}"></script>
<script src="{{asset('frontend/assets/vendor/jquery.gmap/jquery.gmap.min.js')}}"></script>
<script src="{{asset('admin/app-assets/bijoytechJs/farhinaafrin.bijoytech.js')}}"></script>
@endpush

@push('page-scripts')
    
<script src="https://maps.googleapis.com/maps/api/js?key="></script>
<script>
    /*
    Map Settings
        Find the Latitude and Longitude of your address:
            - https://www.latlong.net/
            - http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/
    */

    // Map Markers
    // var mapMarkers = [{
    //     address: "New York, NY 10017",
    //     html: "<strong>New York Office<\/strong><br>New York, NY 10017",
    //     popup: true
    // }];

    // // Map Initial Location
    // var initLatitude = 40.75198;
    // var initLongitude = -73.96978;

    // // Map Extended Settings
    // var mapSettings = {
    //     controls: {
    //         draggable: !window.Wolmart.isMobile,
    //         panControl: true,
    //         zoomControl: true,
    //         mapTypeControl: true,
    //         scaleControl: true,
    //         streetViewControl: true,
    //         overviewMapControl: true
    //     },
    //     scrollwheel: false,
    //     markers: mapMarkers,
    //     latitude: initLatitude,
    //     longitude: initLongitude,
    //     zoom: 11
    // };

    // var map = $( '#googlemaps' ).gMap( mapSettings );

    // // Map text-center At
    // var mapCenterAt = function ( options, e ) {
    //     e.preventDefault();
    //     $( '#googlemaps' ).gMap( "centerAt", options );
    // }

   

// </script>
@endpush
