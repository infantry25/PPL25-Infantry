@extends('layouts.app')


@section('content')
<!-- Carousel Start -->
<div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="owl-carousel header-carousel position-relative">
        @forelse ($services as $key => $service)
        <div class="owl-carousel-item position-relative" data-dot="<img src='{{ $service->image_url }}'>">
            <img class="img-fluid" src="{{ $service->image_url }}" alt="">
            <div class="owl-carousel-inner">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h1 class="display-2 text-white animated slideInDown">{{ $service->tagline }}
                            </h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-3">{{ $service->ringkasan }}</p>
                            <a href=""
                                class="btn btn-primary rounded-pill py-3 px-5 animated slideInLeft">Read
                                More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        @endforelse
    </div>
</div>
<!-- Carousel End -->


<!-- Feature Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-md-6 col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-flex align-items-center mb-4">
                    <div class="btn-lg-square bg-primary rounded-circle me-3">
                        <i class="fa fa-users text-white"></i>
                    </div>
                    <h1 class="mb-0" data-toggle="counter-up">{{ $testimoni->count() }}</h1>
                </div>
                <h5 class="mb-3">Happy Customers</h5>
            </div>
            <div class="col-md-6 col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="d-flex align-items-center mb-4">
                    <div class="btn-lg-square bg-primary rounded-circle me-3">
                        <i class="fa fa-check text-white"></i>
                    </div>
                    <h1 class="mb-0" data-toggle="counter-up">{{ $projects->count() }}</h1>
                </div>
                <h5 class="mb-3">Project Done</h5>
            </div>
        </div>
    </div>
</div>
<!-- Feature Start -->

<!-- About Start -->
<div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
    <div class="container about px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-6 ps-lg-0 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets/img/gondola.png') }}"
                        style="object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="p-lg-5 pe-lg-0">
                    <h6 class="text-primary">About Us</h6>
                    <h1 class="mb-4">We Are Gondola Specialist and General Trading</h1>
                    {{-- <p style="line-height: 1.8em">{!! $konfig->tentang !!}</p> --}}
                    <!-- <p>0</p> -->
                    <a href="{{ route('about') }}" class="btn btn-primary rounded-pill py-3 px-5 mt-3">Explore More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            @foreach ($services as $service)
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded overflow-hidden">
                    <img src="{{ $service->image_url }}" alt=""
                        class="img-fluid"
                        style="width: 100%; height: 250px; object-fit: cover;">
                    <div class="position-relative p-4 pt-0">
                        <div class="service-icon">
                            <i class="fa fa-tram fa-3x"></i>
                        </div>
                        <h4 class="mb-3">{{ $service->categories->nama_kategori }}</h4>
                        <p>{{ $service->ringkasan }}</p>
                        <a class="small fw-medium"
                            href="{{ route('service-detail', [$service->id, $service->categories->slug_kategori]) }}">
                            Read More<i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Tombol "View All Services" -->
            <div class="col-12 text-center mt-4">
                <a href="{{ route('service') }}" class="btn btn-primary">
                    View All Services <i class="fa fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- Service End -->


<!-- Testimonial Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="text-primary">Testimonial</h6>
            <h1 class="mb-4">What Our Clients Say!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            @forelse ($testimoni as $key => $testi)
            <div class="testimonial-item text-center">
                <div class="testimonial-img position-relative">
                    <img class="img-fluid rounded-circle mx-auto mb-5"
                        src="{{ $testi->image == null ? asset('admin/dist/img/user_unknown.png') : $testi->image_url }}">
                    <div class="btn-square bg-primary rounded-circle">
                        <i class="fa fa-quote-left text-white"></i>
                    </div>
                </div>
                <div class="testimonial-text text-center rounded p-4">
                    <p>{{ $testi->komentar }}
                    </p>
                    <h5 class="mb-1">{{ $testi->nama }}</h5>
                    <span class="fst-italic">{{ $testi->pekerjaan }}</span>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
</div>
<!-- Testimonial End -->

<!-- Client Start -->
<!-- <div class="container-xxl">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            {{-- <h6 class="text-primary">Testimonial</h6> --}}
            <h1 class="mb-4">Our Clients</h1>
        </div>
        <div class="company-logos text-center mt-3 pt-md-2 pb-2">
            <div class="row logos">
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mt-4 pl-lg-0 pt-2">
                    <img src="{{ asset('assets/img/logo3.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mt-4 pl-lg-0 pt-2">
                    <img src="{{ asset('assets/img/logo2.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>

    </div>
</div> -->
<!-- Client End -->

@endsection