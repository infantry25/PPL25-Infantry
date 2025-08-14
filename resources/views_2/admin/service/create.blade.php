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
                        <li class="breadcrumb-item active">{{ $title }}</li>
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
                            <h3 class="card-title">Form Tambah Layanan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('service.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="id_user" value="1">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Deskripsi Layanan</label><a style="color: red;">*</a>
                                            <textarea id="summernote" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="8">{{ old('deskripsi', '') }}</textarea>
                                        </div>
                                        @error('deskripsi')
                                        <div class="invalid-feedback">

                                        </div>
                                        @enderror

                                        <div class="form-group">
                                            <label>Icon Layanan</label><a style="color: red;">*</a>
                                            <input type="text"
                                                class="form-control @error('icon') is-invalid @enderror" name="icon"
                                                value="{{ old('icon', '') }}" placeholder="Icon layanan ex : <i class='fas fa-tram fa-3x'></i>">
                                            <small class="text-success">Icon menggunakan Fontawesome. Silahkan kunjungi
                                                <a href="https://fontawesome.com/v5/search?o=r&m=free"
                                                    target="_blank">https://fontawesome.com/</a></small>
                                        </div>
                                        @error('icon')
                                        <div class="invalid-feedback">

                                        </div>
                                        @enderror

                                        <div class="form-group">
                                            <label>Tagline</label><a style="color: red;">*</a>
                                            <input type="text"
                                                class="form-control @error('tagline') is-invalid @enderror" name="tagline"
                                                value="{{ old('tagline', '') }}" placeholder="Masukkan tagline layanan Anda">
                                        </div>
                                        @error('tagline')
                                        <div class="invalid-feedback">

                                        </div>
                                        @enderror


                                        <div class="form-group">
                                            <label for="">Kategori</label><a style="color: red;">*</a>
                                            <select name="id_kategori" id="exampleFormControlSelect1"
                                                class="form-control">
                                                <option value="">Silahkan Pilih Status</option>
                                                @foreach ($kategori as $key => $kat)
                                                <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label>Ringkasan Layanan</label><a style="color: red;">*</a>
                                            <textarea class="form-control @error('ringkasan') is-invalid @enderror" name="ringkasan" rows="8">{{ old('ringkasan', '') }}</textarea>
                                        </div>
                                        @error('ringkasan')
                                        <div class="invalid-feedback">
                                            Silahkan Isi Bagian Ini
                                        </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="exampleInputFile">Unggah Foto</label><a style="color: red;">*</a>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" id="inputimage" name="image"
                                                        accept="image/*" onchange="updatePreview(this, 'image-preview')"
                                                        class="custom-file-input  @error('image') is-invalid @enderror">
                                                    <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                                                </div>
                                            </div>
                                            <img src="{{ asset('admin/dist/img/icon_gallery.png') }}"
                                                id="image-preview" class="img-fluid img-thumbnail mt-2" style="width: 200px">
                                        </div>
                                        @error('image')
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