@extends('layouts.app')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">About</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Feature Start -->
<!-- <div class="container-xxl py-5">
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
                    {{-- <span>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit</span> --}}
                </div>
                <div class="col-md-6 col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="d-flex align-items-center mb-4">
                        <div class="btn-lg-square bg-primary rounded-circle me-3">
                            <i class="fa fa-check text-white"></i>
                        </div>
                        <h1 class="mb-0" data-toggle="counter-up">{{ $projects->count() }}</h1>
                    </div>
                    <h5 class="mb-3">Project Done</h5>
                    {{-- <span>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit</span> --}}
                </div>
            </div>
        </div>
    </div> -->
<!-- Feature Start -->


<!-- About Start -->
<div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
    <div class="container about px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-6 ps-lg-0 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets/img/gondola.png') }}"
                        {{-- <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets/img/about.jpg') }}" --}} style="object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="p-lg-5 pe-lg-0">
                    <h6 class="text-primary">About Us</h6>
                    <h1 class="mb-4">We Are Gondola Specialist and General Trading</h1>
                    <p style="line-height: 1.8em">{!! $konfig->tentang !!}</p>
                    {{-- <p><i class="fa fa-check-circle text-primary me-3"></i>Diam dolor diam ipsum</p>
                        <p><i class="fa fa-check-circle text-primary me-3"></i>Aliqu diam amet diam et eos</p>
                        <p><i class="fa fa-check-circle text-primary me-3"></i>Tempor erat elitr rebum at clita</p> --}}
                    {{-- <a href="{{ route('about') }}" class="btn btn-primary rounded-pill py-3 px-5 mt-3">Explore More</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="text-primary">Team Member</h6>
            <h1 class="mb-4">Experienced Team Members</h1>
        </div>
        <div class="row g-4 justify-content-center">
            @forelse ($staff as $key => $team)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item rounded overflow-hidden">
                    <div class="d-flex">
                        <img class="img-fluid w-75" src="{{ $team->image == null ? asset('admin/dist/img/user_unknown.png') :  $team->image_url }}" alt="">
                        <div class="team-social w-25">
                            <a class="btn btn-lg-square btn-outline-primary rounded-circle mt-3"
                                href="mailto:{{ $team->email }}" target="_blank"><i
                                    class="far fa-envelope"></i></a>
                            <a class="btn btn-lg-square btn-outline-primary rounded-circle mt-3"
                                href="{{ $team->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-lg-square btn-outline-primary rounded-circle mt-3"
                                href="https://wa.me/{{ $team->telepon }}" target="_blank"><i
                                    class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                    <div class="p-4">
                        <h5>{{ $team->nama }}</h5>
                        <span>{{ $team->jabatan }}</span>
                    </div>
                </div>
            </div>
            @empty
            @endforelse

        </div>
    </div>
</div>
<!-- Team End -->
@endsection