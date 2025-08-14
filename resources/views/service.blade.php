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
                <li class="breadcrumb-item text-white active" aria-current="page">Services</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="text-primary">Our Services</h6>
            <h1 class="mb-4">We Are Gondola Specialist and General Trading</h1>
        </div>
        <div class="row g-4">
            @forelse ($services as $key => $service)
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="{{ $service->image_url }}" alt="">
                    <div class="position-relative p-4 pt-0">
                        <div class="service-icon">
                            {!! $service->icon !!}
                        </div>
                        <h4 class="mb-3">{{ $service->categories->nama_kategori }}</h4>
                        <p>{{ $service->ringkasan }}</p>
                        <a class="small fw-medium"
                            href="{{ route('service-detail', [$service->id, $service->categories->slug_kategori]) }}">Read
                            More<i class="fa fa-arrow-right ms-2"></i></a>

                        {{-- <a class="small fw-medium" href="#">Read More<i
                                        class="fa fa-arrow-right ms-2"></i></a> --}}

                    </div>
                </div>
            </div>
            @empty
            @endforelse
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
@endsection