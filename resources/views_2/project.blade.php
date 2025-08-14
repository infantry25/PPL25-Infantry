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
            <h6 class="text-primary">Our Projects</h6>
            <h1 class="mb-4">Visit Our Latest Projects</h1>
        </div>

        <!-- Filter Kategori -->
        <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-12 text-center">
                <ul class="list-inline mb-5" id="portfolio-flters">
                    <li class="mx-2 active" data-filter="*">All</li>
                    @foreach ($categories as $category)
                    <li class="mx-2" data-filter=".{{ $category->slug_kategori }}">
                        {{ $category->nama_kategori }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- List Project -->
        <div class="row g-4 portfolio-container wow fadeInUp" data-wow-delay="0.5s">
            @forelse ($projects as $project)
            <div class="col-lg-4 col-md-6 portfolio-item {{ $project->categories->slug_kategori }}">
                <div class="portfolio-img rounded overflow-hidden">
                    @if(isset($project->project_images[0]))
                    <img class="img-fluid" src="{{ $project->project_images[0]->image_url }}" alt="">
                    <div class="portfolio-btn">
                        <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1"
                            href="{{ $project->project_images[0]->image_url }}" data-lightbox="portfolio">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1"
                            href="{{ route('project.gallery', $project->id) }}">
                            <i class="fa fa-link"></i>
                        </a>
                    </div>
                    @else
                    <img class="img-fluid" src="{{ asset('noimage.png') }}" alt="No Image">
                    @endif
                </div>
                <div class="pt-3">
                    <p class="text-primary mb-0">{{ $project->categories->nama_kategori }}</p>
                    <hr class="text-primary w-25 my-2">
                    <h5 class="lh-base">{{ $project->nama }}</h5>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p>Belum ada proyek yang tersedia.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
<!-- Projects End -->


<!-- Testimonial Start -->
<!-- <div class="container-xxl py-5">
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
    </div> -->
<!-- Testimonial End -->
@endsection