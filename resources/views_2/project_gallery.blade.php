@extends('layouts.app')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Projects</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a class="text-white"
                            href="{{ route('project') }}">Projects</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Projects</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Projects Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1>{{ $projects->nama }}</h1>
                <h3 class="text-secondary mb-4">{{ $projects->lokasi }}</h3>
            </div>
            <div class="row justify-content-center g-4 wow fadeInUp " data-wow-delay="0.5s">

                    <div class="col-lg-8 col-md-6 portfolio-item">
                        <div class=" rounded overflow-hidden">

                            <div class="gallery">
                                <div class="xzoom-container">

                                    {{-- <img class="img-fluid rounded xzoom mb-2" id="xzoom-default" src="{{ asset('assets/img/carousel-1.jpg') }}"
                                    xoriginal="{{ asset('assets/img/carousel-1.jpg') }}" width="660" > --}}

                                    <img class="img-fluid rounded xzoom mb-2" id="xzoom-default" src="{{ $projects->project_images[0]->image_url }}"
                                    xoriginal="{{ $projects->project_images[0]->image_url }}" width="660" >

                                    <div class="xzoom-thumbs">
                                        @forelse ($projects->project_images as $item)
                                        <a href="{{ $item->image_url }}"><img class="xzoom-gallery" width="128"
                                            src="{{ $item->image_url }}" xpreview="{{ $item->image_url }}" /></a>
                                        @empty

                                        @endforelse
                                        {{-- <a href="{{ asset('assets/img/carousel-1.jpg') }}"><img class="xzoom-gallery" width="128"
                                            src="{{ asset('assets/img/carousel-1.jpg') }}" xpreview="{{ asset('assets/img/carousel-1.jpg') }}" /></a>
                                        <a href="{{ asset('assets/img/carousel-1.jpg') }}"><img class="xzoom-gallery" width="128"
                                            src="{{ asset('assets/img/carousel-1.jpg') }}" xpreview="{{ asset('assets/img/carousel-1.jpg') }}" /></a>
                                        <a href="{{ asset('assets/img/carousel-1.jpg') }}"><img class="xzoom-gallery" width="128"
                                            src="{{ asset('assets/img/carousel-1.jpg') }}" xpreview="{{ asset('assets/img/carousel-1.jpg') }}" /></a>
                                        <a href="{{ asset('assets/img/carousel-1.jpg') }}"><img class="xzoom-gallery" width="128"
                                            src="{{ asset('assets/img/carousel-1.jpg') }}" xpreview="{{ asset('assets/img/carousel-1.jpg') }}" /></a>
                                        <a href="{{ asset('assets/img/carousel-3.jpg') }}"><img class="xzoom-gallery" width="128"
                                            src="{{ asset('assets/img/carousel-3.jpg') }}" xpreview="{{ asset('assets/img/carousel-3.jpg') }}" /></a> --}}
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="pt-3">
                            <p class="text-primary mb-0">Tentang Projek</p>
                            <hr class="text-primary w-25 my-2">
                            <h5 class="lh-base">{!! $projects->deskripsi !!}</h5>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <!-- Projects End -->


    <!-- Testimonial Start -->
    {{-- <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="text-primary">Testimonial</h6>
            <h1 class="mb-4">What Our Clients Say!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item text-center">
                <div class="testimonial-img position-relative">
                    <img class="img-fluid rounded-circle mx-auto mb-5" src="{{ asset('assets/img/testimonial-1.jpg') }}">
                    <div class="btn-square bg-primary rounded-circle">
                        <i class="fa fa-quote-left text-white"></i>
                    </div>
                </div>
                <div class="testimonial-text text-center rounded p-4">
                    <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p>
                    <h5 class="mb-1">Client Name</h5>
                    <span class="fst-italic">Profession</span>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <div class="testimonial-img position-relative">
                    <img class="img-fluid rounded-circle mx-auto mb-5" src="{{ asset('assets/img/testimonial-2.jpg') }}">
                    <div class="btn-square bg-primary rounded-circle">
                        <i class="fa fa-quote-left text-white"></i>
                    </div>
                </div>
                <div class="testimonial-text text-center rounded p-4">
                    <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p>
                    <h5 class="mb-1">Client Name</h5>
                    <span class="fst-italic">Profession</span>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <div class="testimonial-img position-relative">
                    <img class="img-fluid rounded-circle mx-auto mb-5" src="{{ asset('assets/img/testimonial-3.jpg') }}">
                    <div class="btn-square bg-primary rounded-circle">
                        <i class="fa fa-quote-left text-white"></i>
                    </div>
                </div>
                <div class="testimonial-text text-center rounded p-4">
                    <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p>
                    <h5 class="mb-1">Client Name</h5>
                    <span class="fst-italic">Profession</span>
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <!-- Testimonial End -->


@endsection
