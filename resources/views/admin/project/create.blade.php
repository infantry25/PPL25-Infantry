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
                            <h3 class="card-title">Form Tambah Project</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('project.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

                                    <div class="col-sm-6">

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

                                        <div class="form-group">
                                            <label>Nama Perusahaan </label><a style="color: red;">*</a>
                                            <input type="text"
                                                class="form-control @error('nama') is-invalid @enderror" name="nama"
                                                value="{{ old('nama', '') }}" placeholder="Silahkan masukkan nama perusahaan">
                                        </div>
                                        @error('nama')
                                        <div class="invalid-feedback">

                                        </div>
                                        @enderror

                                        <div class="form-group">
                                            <label>Lokasi</label><a style="color: red;">*</a>
                                            <input type="text"
                                                class="form-control @error('lokasi') is-invalid @enderror"
                                                name="lokasi" value="{{ old('lokasi', '') }}" placeholder="Silahkan masukkan nama kota. Ex: DKI Jakarta">
                                        </div>
                                        @error('lokasi')
                                        <div class="invalid-feedback">

                                        </div>
                                        @enderror

                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Deskripsi Project</label><a style="color: red;">*</a>
                                            <textarea id="summernote" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="8">{{ old('deskripsi', '') }}</textarea>
                                        </div>
                                        @error('deskripsi')
                                        <div class="invalid-feedback">

                                        </div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="exampleInputFile">Upload Foto</label><a style="color: red;">*</a>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" id="inputimage" name="photos[]" multiple
                                                        {{-- accept="image/*" onchange="updatePreview(this, 'image-preview')" --}}
                                                        class="custom-file-input  @error('photos') is-invalid @enderror"
                                                        data-show-upload="false" data-show-caption="true">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                            @error('photos')
                                            <div class="invalid-feedback">

                                            </div>
                                            @enderror
                                        </div>
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