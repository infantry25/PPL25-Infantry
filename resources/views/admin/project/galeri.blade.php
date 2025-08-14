@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $title }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('project.index') }}">Project</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                {{-- Alert Message --}}
                @if (session('success'))
                    {{-- Jika alert data sukses --}}
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif ($errors->any())
                    {{-- Jika aler --}}
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">
                    <!-- right column -->
                    <div class="col-md-12">

                        <!-- general form elements disabled -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <h5>Project : {{ $projects->nama }}</h5>
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                {{-- <a href="{{ route('testimonial.create') }}" class="btn btn-outline-success float-left">
                                    <i class="fas fa-plus"></i> Tambah
                                </a> --}}
                                {{-- <a href="{{ route('project.create') }}" type="button"
                                    class="btn btn-outline-success float left">
                                    <i class="fas fa-plus"></i> Tambah
                                </a> --}}
                                <form action="{{ route('project.images', $projects->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="exampleInputFile">Upload Foto</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" id="inputimage" name="photos[]" multiple
                                                        {{-- accept="image/*" onchange="updatePreview(this, 'image-preview')" --}}
                                                        class="custom-file-input  @error('photos') is-invalid @enderror"
                                                        data-show-upload="false" data-show-caption="true">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                                <button type="submit" class="btn btn-primary ml-2">Submit</button>
                                            </div>
                                        </div>
                                        @error('photos')
                                            <div class="invalid-feedback">

                                            </div>
                                        @enderror

                                    </div>
                                </form>
                                <div class="row">
                                    @forelse ($project_images as $key => $item)
                                        <div class="col-sm-2">
                                            <a href="{{ $item->image_url }}" data-toggle="lightbox"
                                                data-title="{{ $item->projects->nama }}" data-gallery="gallery">
                                                <img src="{{ $item->image_url }}" class="img-fluid mb-2"
                                                    alt="white sample" />
                                                {{-- <form action="{{ route('projectimages.destroy', $item->id) }}" method="POST"  class="text-center mb-2"> --}}
                                                    <form action="{{ route('project.delete', $item->id) }}" method="POST"  class="text-center mb-2">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-outline-danger delete" type="button"
                                                        data-id="{{ $item->id }}" data-toggle="tooltip"
                                                        title='Delete'><i class="fas fa-trash"></i></button>
                                                </form>
                                            </a>
                                        </div>
                                    @empty
                                    @endforelse

                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>


    {{-- <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script> --}}

@endsection
