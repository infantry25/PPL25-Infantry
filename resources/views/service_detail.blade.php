@extends('layouts.app')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Services</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="{{route('service')}}">Services</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Detail</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Service Detail Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="text-primary">Our Services</h6>
                <h1 class="mb-4">{{ $service->categories->nama_kategori }}</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-img rounded overflow-hidden">
                        <img src="{{ $service->image_url }}" alt="" class="img-fluid">
                        {{-- <div class="position-relative p-4 pt-0">
                            <p>
                                Kami melakasanakan pekerjaan Design, Estimasi, Instalasi dan Test Commissioning
                                pada beberapa gedung, seperti gedung perkantoran, hotel dan apartemen, serta
                                shopping mall.
                            </p>
                        </div> --}}
                    </div>
                </div>
                <div class="col-12 ms-2 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative p-4 pt-0">
                        <span>{!! $service->deskripsi !!}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Detail End -->
@endsection
