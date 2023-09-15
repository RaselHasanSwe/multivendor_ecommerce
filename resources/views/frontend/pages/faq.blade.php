@extends('layouts.master')

@section('title', 'FAQ')

@section('meta')
    <meta name="keywords" content="" />
    <meta name="description"content="">
    <meta name="author" content="">
@endsection

@section('content')
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">FAQ</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav mb-10 pb-0">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->
    
    <!-- Start of PageContent -->
    <div class="page-content faq">
        <div class="container">
            <section class="content-title-section">
                <h3 class="title title-simple justify-content-center bb-no pb-5">Frequent Asked Questions
                </h3>
            </section>

            <section class="mb-6">
                <div class="row">
                    <div class="col-md-12 mb-8">
                        <div class="accordion accordion-bg accordion-gutter-md accordion-border">
                            @if(count($faqData) > 0)
                                @foreach($faqData as $faqKey => $faq)
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse1-{{$faqKey}}" class="{{($faqKey == 0) ? 'collapse' : ''}}">{{$faq->title}}</a>
                                        </div>
                                        <div id="collapse1-{{$faqKey}}" class="card-body {{($faqKey == 0) ? 'expanded' : 'collapsed'}}">
                                            <p class="mb-0">{!! $faq->description !!}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- End of PageContent -->
@endsection

@push('js')
    <!-- Plugin JS File -->
    <script src="{{ asset('frontend/assets/vendor/jquery.count-to/jquery.count-to.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
@endpush