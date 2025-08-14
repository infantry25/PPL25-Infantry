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
                                <h3 class="card-title">Form Ubah Project</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form method="POST" action="{{ route('project.update', $projects->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <input type="hidden" name="id_user" value="1">

                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label for="">Kategori</label>
                                                <select name="id_kategori" id="exampleFormControlSelect1"
                                                    class="form-control">
                                                    @foreach ($kategori as $key => $kat)
                                                        <option value="{{ $kat->id }}"
                                                            {{ $projects->id_kategori == $kat->id ? 'selected' : '' }}>
                                                            {{ $kat->nama_kategori }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Nama Klien</label>
                                                <input type="text"
                                                    class="form-control @error('nama') is-invalid @enderror" name="nama"
                                                    value="{{ old('nama', $projects->nama) }}"
                                                    placeholder="Silahkan masukkan nama klien">
                                            </div>
                                            @error('nama')
                                                <div class="invalid-feedback">

                                                </div>
                                            @enderror

                                            <div class="form-group">
                                                <label>Lokasi</label>
                                                <input type="text"
                                                    class="form-control @error('lokasi') is-invalid @enderror"
                                                    name="lokasi" value="{{ old('lokasi', $projects->lokasi) }}"
                                                    placeholder="silahkan masukkan nama kota. Ex: DKI Jakarta">
                                            </div>
                                            @error('lokasi')
                                                <div class="invalid-feedback">

                                                </div>
                                            @enderror

                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Deskripsi Project</label>
                                                <textarea id="summernote" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="8">{{ old('deskripsi', $projects->deskripsi) }}</textarea>
                                            </div>
                                            @error('deskripsi')
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
