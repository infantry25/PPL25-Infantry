@extends('layouts.app')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Contact</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid bg-light overflow-hidden px-lg-0" style="margin: 6rem 0;">
        <div class="container contact px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 contact-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 ps-lg-0">
                        <h6 class="text-primary">Contact Us</h6>
                        <h1 class="mb-4">Feel Free To Contact Us</h1>

                        {{-- <form> --}}
                        <div class="row g-3">
                            <div class="wow fadeIn" data-wow-delay="0.3s">
                                <div class="row align-items-center mb-4 mt-2">
                                    <div class="col-3 btn-lg-square bg-primary rounded-circle mx-2">
                                        <i class="fa fa-map-marker-alt text-white"></i>
                                    </div>
                                    <div class="col-9">
                                        <h5>Our Head Office Address :</h5>
                                        <p>{{ $konfig->alamat }}</p>
                                    </div>
                                    <div class="row align-items-center mb-4 mt-4">
                                        <div class="col-3 btn-lg-square bg-primary rounded-circle mx-2">
                                            <i class="fa fa-phone-alt text-white"></i>
                                        </div>
                                        <div class="col-9">
                                            <h5>Call for Help :</h5>
                                            <p>
                                                <a href="https://wa.me/{{ '+62'.substr($konfig->hp, 1) }}"
                                                    target="_blank"><span>{{ $konfig->hp }}</span>
                                                </a>
                                            </p>
                                            <p>
                                                <a href="tel:{{ $konfig->telepon }}" target="_blank">
                                                    <span>{{ $konfig->telepon }}</span>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mb-4 mt-4">
                                        <div class="col-3 btn-lg-square bg-primary rounded-circle mx-2">
                                            <i class="fa fa-envelope text-white"></i>
                                        </div>
                                        <div class="col-9">
                                            <h5>Mail Us :</h5>
                                            <p><a href="mailto:{{ $konfig->email }}" target="_blank">
                                                    <span>{{ $konfig->email }}</span>
                                                </a></p>
                                        </div>
                                    </div>
                                </div>
                                {{-- <span>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit</span> --}}
                            </div>
                            {{-- <div class="col-12">
                                <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Send
                                    Message</button>
                            </div> --}}
                        </div>
                        {{-- </form> --}}
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        {{-- <iframe class="position-absolute w-100 h-100" style="object-fit: cover;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                            frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> --}}
                        {{-- <iframe class="position-absolute w-100 h-100" style="object-fit: cover;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126919.58010081438!2d106.7796985126474!3d-6.232472746211228!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698d8ac858b04d%3A0xa4b200e21325fb4c!2sPT.DCA%20PERCETAKAN!5e0!3m2!1sid!2sid!4v1703235480499!5m2!1sid!2sid"
                            style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                            {!! $konfig->google_map !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
