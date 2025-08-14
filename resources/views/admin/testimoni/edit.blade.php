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
                        <li class="breadcrumb-item active">Testimoni</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="row">
                <!-- right column -->
                <div class="col-md-12">

                    <!-- general form elements disabled -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Testimoni</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('testimonial.update', $testimonial->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text"
                                                class="form-control @error('nama') is-invalid @enderror" name="nama"
                                                value="{{ old('nama', $testimonial->nama) }}">
                                        </div>
                                        @error('nama')
                                        <div class="invalid-feedback">

                                        </div>
                                        @enderror

                                        <div class="form-group">
                                            <label>Pekerjaan</label>
                                            <input type="text"
                                                class="form-control @error('pekerjaan') is-invalid @enderror"
                                                name="pekerjaan"
                                                value="{{ old('pekerjaan', $testimonial->pekerjaan) }}">
                                        </div>
                                        @error('pekerjaan')
                                        <div class="invalid-feedback">

                                        </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="exampleInputFile">Unggah Foto</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" id="inputimage" name="image"
                                                        accept="image/*" onchange="updatePreview(this, 'image-preview')"
                                                        class="custom-file-input  @error('image') is-invalid @enderror">
                                                    <label class="custom-file-label" for="exampleInputFile">Pilih
                                                        file</label>
                                                </div>
                                            </div>
                                            @php
                                            $imagePath = $testimonial->image == null || $testimonial->image == ''
                                            ? asset('admin/dist/img/user_unknown.png')
                                            : str_replace('main/public', 'main/', asset('storage/app/public/' . $testimonial->image));
                                            @endphp
                                            <img src="{{ $imagePath }}"
                                                id="image-preview" class="img-fluid img-thumbnail mt-2"
                                                style="width: 200px">
                                            <p class="mt-1">Foto profil saat ini</p>
                                        </div>
                                        @error('image')
                                        <div class="invalid-feedback">

                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label>Komentar</label>
                                            <textarea class="form-control @error('komentar') is-invalid @enderror" name="komentar" rows="6">{{ old('komentar', $testimonial->komentar) }}</textarea>
                                        </div>
                                        @error('komentar')
                                        <div class="invalid-feedback">

                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="card-footer float-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    {{-- <a href="#" type="submit" class="btn btn-default">Cancel</a> --}}
                                    <input type="reset" name="reset" value="Reset" class="btn btn-secondary ">
                                </div>
                            </form>
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

@endsection