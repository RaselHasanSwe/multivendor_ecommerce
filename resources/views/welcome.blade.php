@extends('layouts.front')
@section('title')
    BijoyTech It Institute
@endsection
@section('content')

    <!-- Homepage Company Introduction Section Start -->
    <section class="home-intro-section" style="background-image: url({{ asset('admin/site_setting/'. $g_settings->banner) }});">
        <div class="gradient-overlay"></div>
        <div class="container">
            <div class="home-intro-content-box">
                <h3 class="subtitle">{{ $g_settings->banner_title }}</h3>
                <div class="title common-title">
                    Level-Up Your Tech Skill In
                    <!-- Typed Text Change Start -->
                    <div class="typed-text-items-wrapper">
                        <div id="typedStrings">
                            @if ( $coursesMenu->subCategories->count() > 0)
                                @foreach ($coursesMenu->subCategories as $courseCategory)
                                    <h2 class="typed-text-item">{{ $courseCategory->name }}</h2>
                                @endforeach
                            @endif
                        </div>
                        <span id="textTyped" style="white-space: pre;"></span>
                    </div>
                    <!-- Typed Text Change End -->
                </div>
                <p>
                    {!! Str::limit($g_settings->banner_sort_descriptions, 122) !!}
                </p>
                <a class="common-outline-animate-btn" href="{{ route('course', ['category' => $coursesMenu->slug]) }}">View Courses</a>
            </div>
        </div>
    </section>
    <!-- Homepage Company Introduction Section End-->

    <!-- Support Feature Section Start -->
    <section class="bt-support-features-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 bt-support-feature-item-outer">
                    <div class="bt-support-feature-item-inner">
                        <div class="image">
                            <img src="{{ asset('/') }}front/assets/image/Group1.svg" />
                        </div>
                        <div class="content">
                            <h2 class="title">Lifetime Support</h2>
                            <h2 class="sub-title">From Expert Community</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 bt-support-feature-item-outer">
                    <div class="bt-support-feature-item-inner">
                        <div class="image">
                            <img src="{{ asset('/') }}front/assets/image/Group2.svg" />
                        </div>
                        <div class="content">
                            <h2 class="title">Earning Guarantee</h2>
                            <h2 class="sub-title">By Job Placement or Outsourcing</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 bt-support-feature-item-outer">
                    <div class="bt-support-feature-item-inner">
                        <div class="image">
                            <img src="{{ asset('/') }}front/assets/image/Group3.svg" />
                        </div>
                        <div class="content">
                            <h2 class="title">Excellence in Teaching</h2>
                            <h2 class="sub-title">Enroll Now as a Student</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 bt-support-feature-item-outer">
                    <div class="bt-support-feature-item-inner">
                        <div class="image">
                            <img src="{{ asset('/') }}front/assets/image/Group4.svg" />
                        </div>
                        <div class="content">
                            <h2 class="title">Get Free Resources</h2>
                            <h2 class="sub-title">To Empower Yourself Regularly</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Support Feature Section End -->

    <!-- Home Our Core Service Section Start -->
    <section class="home-our-core-services-section" id="BTAllService">
        <div class="container">
            <div class="common-title-box">
                <h1 class="title common-title mb-4">Find Your Perfect Courses</h1>
            </div>
            <ul class="nav nav-tabs home-our-core-services-tab-btn-wrapper" id="myTab" role="tablist">
                @if ( count( @$coursesMenu->subCategories ) > 0)
                    @foreach (@$coursesMenu->subCategories as $key => $courseMenu)
                        <li class="nav-item">
                            <a class="nav-link {{ $key == 0 ? 'active' : '' }}" id="cTabHeading-{{ $key }}-tab" data-toggle="tab" href="#cTabHeading-{{ $key }}" role="tab" aria-controls="#cTabHeading-{{ $key }}" aria-selected="true">{{ $courseMenu->name }}</a>
                        </li>
                    @endforeach
                @endif
            </ul>
            <div class="tab-content home-our-core-services-tab-content" id="myTabContent">
                @if ( count( @$coursesMenu->subCategories ) > 0)
                    @foreach (@$coursesMenu->subCategories as $key => $courseMenu)
                        <div class="tab-pane fade show {{ $key == 0 ? 'active' : '' }}" id="cTabHeading-{{ $key }}" role="tabpanel" aria-labelledby="cTabHeading-{{ $key }}-tab">
                            @if ( count( $courseMenu->courses ) > 0 )
                                <div class="tab-preloader">
                                    <div class="tab-loader"></div>
                                </div>
                                <div class="home-our-core-services-tab-slider-inner owl-carousel">
                                    @foreach ($courseMenu->courses as $course)
                                        <div class="home-our-core-services-tab-item">
                                            <div class="image">
                                                <img src="{{ asset('courses/images/'.$course->image) }}" />
                                            </div>
                                            <div class="content">
                                                <a href="{{ route('course', ['category' => $coursesMenu->slug, 'subcategory' => $courseMenu->slug, 'course' => $course->slug]) }}">
                                                    <h2 class="title">{{ $course->title }}</h2>
                                                </a>

                                                <div class="meta-tags">
                                                    @if($course->lectures)
                                                    <h2 class="meta-tag">
                                                        <i class="fas fa-list mr-1"></i>
                                                        {{ $course->lectures }} lectures
                                                    </h2>
                                                    @endif
                                                    @if($course->hours)
                                                    <h2 class="meta-tag">
                                                        <i class="far fa-clock mr-1"></i>
                                                        {{ $course->hours }} Hours
                                                    </h2>
                                                    @endif
                                                    <h2 class="meta-tag">
                                                        <i class="fas fa-signal mr-1"></i>
                                                        All levels
                                                    </h2>
                                                    <h2 class="meta-tag">
                                                        <i class="fas fa-calendar-alt mr-1"></i>
                                                        {{ date('j M', strtotime($course->start_date)) }} - {{ date('j M', strtotime($course->end_date)) }}
                                                    </h2>
                                                </div>

                                                {{ substr(strip_tags($course->description), 0, 120) }}
                                                <hr />
                                                <div class="price-box">
                                                    <div class="left">
                                                        <h2 class="prev-price">Tk {{ $course->price }}</h2>
                                                        <h2 class="current-price">Tk {{ ( $course->price - (($course->price * $course->discount) / 100) )}}</h2>
                                                    </div>
                                                    <div class="right">
                                                        <a class="common-animate-btn" href="{{ route('contact-us') }}">Join Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="alert alert-primary" role="alert">
                                    Sorry! No course available now.
                                </div>
                            @endif
                        </div>
                    @endforeach
                @endif

                <div class="d-flex justify-content-center">
                    <a class="common-outline-animate-btn" href="course-details.php">All Courses</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Home Our Core Service Section End -->

    <!-- We Create Section Start -->
    <section class="we-create-section">
        <div class="container">
            <div class="row we-create-items-wrap">
                <!-- Static Images start-->
                <img class="wc-bg wc-bg-1" src="{{ asset('/') }}front/assets/image/wc-1.png" />
                <img class="wc-bg wc-bg-2" src="{{ asset('/') }}front/assets/image/wc-2.svg" />
                <img class="wc-bg wc-bg-3" src="{{ asset('/') }}front/assets/image/wc-3.svg" />
                <img class="wc-bg wc-bg-4" src="{{ asset('/') }}front/assets/image/wc-4.png" />
                <img class="wc-bg wc-bg-5" src="{{ asset('/') }}front/assets/image/wc-5.svg" />
                <img class="wc-bg wc-bg-6" src="{{ asset('/') }}front/assets/image/wc-6.svg" />
                <!-- Static Images End-->
                <div class="col-md-7 we-create-item-left-outer">
                    <div class="we-create-item-left-inner">
                        <h2 class="title common-title">We Create IT Experts</h2>
                        <div class="details">
                            <p>Bijoy IT Training Institute provides technology oriented education from newbie to professional.We’ve been offering outcomes driven IT education to the career-minded students in Bangladesh.</p>
                            <p>
                                If you are passionate about a career in digital & information technology, we can help you get the right skills to follow your passion. Boost your career with the tech-driven skills for the future of
                                work and start earning from day one. So let our industry expert teach you the secrets of.
                            </p>
                        </div>
                        <a class="common-outline-animate-btn" href="{{ route('course',['category'=>'courses']) }}">View Courses</a>
                    </div>
                </div>
                <div class="col-md-5 we-create-item-right-outer">
                    <div class="we-create-item-right-inner">
                        <!-- Static Images start-->
                        <img class="wc-img-bg wc-img-bg-1" src="{{ asset('/') }}front/assets/image/wc-img-bg-0.svg" />
                        <img class="wc-img-bg wc-img-bg-2" src="{{ asset('/') }}front/assets/image/wc-img-bg-1.svg" />
                        <img class="wc-img-bg wc-img-bg-3" src="{{ asset('/') }}front/assets/image/wc-img-bg-2.svg" />
                        <!-- Static Images End-->

                        <!-- Main Image which might dynamically change -->
                        <img class="wc-main-img" src="{{ asset('/') }}front/assets/image/Banner-11-1.png" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- We Create Section End -->

    <!-- our advise-section start -->
    <section class="our-advise-section">
        <div class="container">
            <div class="common-heading mb-5">
                <h2 class="common-title">Don't Waste Your Valuable Time and Money</h2>
                <h2 class="common-subtitle">Bijoy IT Institute uses most effective way to master the skills corporate companies want.</h2>
            </div>
            <div class="row our-advise-items-wrapper">
                <div class="col-lg-6 our-advise-item-outer">
                    <div class="our-advise-item-inner">
                        <div class="image">
                            <img src="{{ asset('/') }}front/assets/image/Group 203.svg" />
                        </div>
                        <div class="content">
                            <h2 class="title">Get Real Tech Skill</h2>
                            <p>Our quality IT training course curriculum is designed with industry professionals. So you learn the top skills that corporate companies want.</p>
                            <p>Whether you are doing job in a office or home, these couses will bring your career and earning to the next level.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 our-advise-item-outer">
                    <div class="our-advise-item-inner">
                        <div class="image">
                            <img src="{{ asset('/') }}front/assets/image/Group 203.svg" />
                        </div>
                        <div class="content">
                            <h2 class="title">Get Real Tech Skill</h2>
                            <p>Our quality IT training course curriculum is designed with industry professionals. So you learn the top skills that corporate companies want.</p>
                            <p>Whether you are doing job in a office or home, these couses will bring your career and earning to the next level.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 our-advise-item-outer">
                    <div class="our-advise-item-inner">
                        <div class="image">
                            <img src="{{ asset('/') }}front/assets/image/Group 203.svg" />
                        </div>
                        <div class="content">
                            <h2 class="title">Get Real Tech Skill</h2>
                            <p>Our quality IT training course curriculum is designed with industry professionals. So you learn the top skills that corporate companies want.</p>
                            <p>Whether you are doing job in a office or home, these couses will bring your career and earning to the next level.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 our-advise-item-outer">
                    <div class="our-advise-item-inner">
                        <div class="image">
                            <img src="{{ asset('/') }}front/assets/image/Group 203.svg" />
                        </div>
                        <div class="content">
                            <h2 class="title">Get Real Tech Skill</h2>
                            <p>Our quality IT training course curriculum is designed with industry professionals. So you learn the top skills that corporate companies want.</p>
                            <p>Whether you are doing job in a office or home, these couses will bring your career and earning to the next level.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 our-advise-item-outer">
                    <div class="our-advise-item-inner">
                        <div class="image">
                            <img src="{{ asset('/') }}front/assets/image/Group 203.svg" />
                        </div>
                        <div class="content">
                            <h2 class="title">Get Real Tech Skill</h2>
                            <p>Our quality IT training course curriculum is designed with industry professionals. So you learn the top skills that corporate companies want.</p>
                            <p>Whether you are doing job in a office or home, these couses will bring your career and earning to the next level.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 our-advise-item-outer">
                    <div class="our-advise-item-inner">
                        <div class="image">
                            <img src="{{ asset('/') }}front/assets/image/Group 203.svg" />
                        </div>
                        <div class="content">
                            <h2 class="title">Get Real Tech Skill</h2>
                            <p>Our quality IT training course curriculum is designed with industry professionals. So you learn the top skills that corporate companies want.</p>
                            <p>Whether you are doing job in a office or home, these couses will bring your career and earning to the next level.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row advise-bottom-content-wrapper pb-0">
                <div class="col-lg-7 advise-bottom-left-outer">
                    <div class="advise-bottom-left-inner">
                        <div class="image">
                            <img src="{{ asset('/') }}front/assets/image/Slider-2.jpg" />
                        </div>
                        <div class="content">
                            <h2 class="title">
                                We Build a Solid Foundation for a Bijoy IT Others Career in Technology
                            </h2>

                            <p>Bijoy IT Training institute is the right place if you want to level-up you tech skill.</p>
                            <p>Our courses are designed to keep you on track, so you learn to perform "today" not "someday".</p>

                            <a class="common-animate-btn" href="{{ route('contact-us') }}">Join Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 advise-bottom-right-outer">
                    <div class="advise-bottom-right-inner">
                        <h2 class="title">Only at Bijoy IT Institute: <b>Job-Ready Skills</b></h2>
                        <table>
                            <thead>
                                <tr>
                                    <th class="no-bg"></th>
                                    <th class="bt">Bijoy IT</th>
                                    <th class="ot">Others</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Learn by doing</td>
                                    <td class="bt"><i class="fas fa-check"></i></td>
                                    <td class="ot"><i class="fas fa-times"></i></td>
                                </tr>
                                <tr>
                                    <td>Earn top-level skill</td>
                                    <td class="bt"><i class="fas fa-check"></i></td>
                                    <td class="ot"><i class="fas fa-times"></i></td>
                                </tr>
                                <tr>
                                    <td>Job-focused content</td>
                                    <td class="bt"><i class="fas fa-check"></i></td>
                                    <td class="ot"><i class="fas fa-times"></i></td>
                                </tr>
                                <tr>
                                    <td>Scholarship & Free Courses</td>
                                    <td class="bt"><i class="fas fa-check"></i></td>
                                    <td class="ot"><i class="fas fa-times"></i></td>
                                </tr>
                                <tr>
                                    <td>Ensure earning</td>
                                    <td class="bt"><i class="fas fa-check"></i></td>
                                    <td class="ot"><i class="fas fa-times"></i></td>
                                </tr>
                                <tr>
                                    <td>Real-life projects</td>
                                    <td class="bt"><i class="fas fa-check"></i></td>
                                    <td class="ot"><i class="fas fa-times"></i></td>
                                </tr>
                                <tr>
                                    <td>Lifetime support</td>
                                    <td class="bt"><i class="fas fa-check"></i></td>
                                    <td class="ot"><i class="fas fa-times"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our advise-section end -->

    <!-- Service Request Start -->
    <section class="service-request-section pt-0">
        <div class="container">
            <div class="row service-request-items-wrap">
                <div class="col-lg-6 service-request-item-outer">
                    <div class="service-request-item-inner">
                        <h2 class="title">Mobile Computer Lab</h2>

                        <p>Don't have Computer Lab at your place? We set-up a portable Computer Lab on-site based on total participants. No hassle for you.</p>

                        <a class="common-outline-animate-btn" href="{{ route('contact-us')}}">Request For More</a>
                    </div>
                </div>
                <div class="col-lg-6 service-request-item-outer">
                    <div class="service-request-item-inner">
                        <h2 class="title">Bijoy IT for Business Training</h2>

                        <p>Don't have Computer Lab at your place? We set-up a portable Computer Lab on-site based on total participants. No hassle for you.</p>

                        <a class="common-outline-animate-btn" href="{{ route('contact-us')}}">Request For More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Request End -->

    <!-- Recgonized By Start -->
    @include('front.partials.recognized-by')
    <!-- Recgonized By End -->

@endsection

@section('styles')
    <style>
        .nav-item{
            padding: 10px 0px !important;
        }
    </style>
@endsection
