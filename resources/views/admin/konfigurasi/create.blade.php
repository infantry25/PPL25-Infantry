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
                            <li class="breadcrumb-item active">Konfigurasi Umum</li>
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
                                <h3 class="card-title">Pengaturan Konfigurasi Web</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form method="POST" action="{{ route('configuration.store') }}">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" name="id_user" value="1">
                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label>Tentang Perusahaan</label>
                                                <textarea class="form-control @error('tentang') is-invalid @enderror" name="tentang" rows="5">{{ old('tentang', '') }}</textarea>
                                            </div>
                                            @error('tentang')
                                                <div class="invalid-feedback">
                                                    Silahkan Isi Bagian Ini
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label>Deskripsi Web</label>
                                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="4">{{ old('deskripsi', '') }}</textarea>
                                            </div>
                                            @error('deskripsi')
                                                <div class="invalid-feedback">

                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h4>Informasi Umum</h4>

                                            <div class="form-group">
                                                <label>Nama Perusahaan</label>
                                                <input type="text"
                                                    class="form-control @error('nama_web') is-invalid @enderror"
                                                    name="nama_web" value="{{ old('nama_web', '') }}">
                                            </div>
                                            @error('nama_web')
                                                <div class="invalid-feedback">

                                                </div>
                                            @enderror

                                            <div class="form-group">
                                                <label>Nama Singkat Perusahaan</label>
                                                <input type="text"
                                                    class="form-control @error('nama_singkat') is-invalid @enderror"
                                                    name="nama_singkat" value="{{ old('nama_singkat', '') }}">
                                            </div>
                                            @error('nama_singkat')
                                                <div class="invalid-feedback">

                                                </div>
                                            @enderror

                                            <div class="form-group">
                                                <label>Tagline/Motto Perusahaan</label>
                                                <input type="text"
                                                    class="form-control @error('tagline') is-invalid @enderror"
                                                    name="tagline" value="{{ old('tagline', '') }}">
                                            </div>
                                            @error('tagline')
                                                <div class="invalid-feedback">

                                                </div>
                                            @enderror

                                            <div class="form-group">
                                                <label>Tagline/Motto Perusahaan - 2</label>
                                                <input type="text"
                                                    class="form-control @error('tagline_2') is-invalid @enderror"
                                                    name="tagline_2" value="{{ old('tagline_2', '') }}">
                                            </div>
                                            @error('tagline_2')
                                                <div class="invalid-feedback">

                                                </div>
                                            @enderror

                                            <div class="form-group">
                                                <label>Email Perusahaan</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email', '') }}">
                                            </div>
                                            @error('email')
                                                <div class="invalid-feedback">

                                                </div>
                                            @enderror

                                            <div class="form-group">
                                                <label>Alamat Perusahaan</label>
                                                <input type="text"
                                                    class="form-control @error('alamat') is-invalid @enderror"
                                                    name="alamat" value="{{ old('alamat', '') }}">
                                            </div>
                                            @error('alamat')
                                                <div class="invalid-feedback">

                                                </div>
                                            @enderror

                                            <div class="form-group">
                                                <label>No. Telepon Perusahaan</label>
                                                <input type="text"
                                                    class="form-control @error('telepon') is-invalid @enderror"
                                                    name="telepon" value="{{ old('telepon', '') }}">
                                            </div>
                                            @error('telepon')
                                                <div class="invalid-feedback">

                                                </div>
                                            @enderror

                                            <div class="form-group">
                                                <label>No. Hp Perusahaan</label>
                                                <input type="text" class="form-control @error('hp') is-invalid @enderror"
                                                    name="hp" value="{{ old('hp', '') }}">
                                            </div>
                                            @error('hp')
                                                <div class="invalid-feedback">

                                                </div>
                                            @enderror
                                            <div class="form-group">
                                                <label>Map Perusahaan</label>
                                                <textarea class="form-control @error('google_map') is-invalid @enderror" name="google_map" rows="5">{{ old('google_map', '') }}</textarea>
                                            </div>
                                            @error('google_map')
                                                <div class="invalid-feedback">

                                                </div>
                                            @enderror
                                            <div class="form-group">
                                                <style type="text/css" media="screen">
                                                    iframe {
                                                        width: 100%;
                                                        max-height: 200px;
                                                    }
                                                </style>
                                                @if (!empty($konfig->google_map) == '')
                                                <span></span>
                                                @else
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h4>Social Media</h4>

                                            <div class="form-group">
                                                <label>Url Facebook</label>
                                                <input type="text"
                                                    class="form-control @error('facebook') is-invalid @enderror"
                                                    name="facebook" value="{{ old('facebook', '') }}">
                                            </div>
                                            @error('facebook')
                                                <div class="invalid-feedback">

                                                </div>
                                            @enderror

                                            <div class="form-group">
                                                <label>Nama Facebook</label>
                                                <input type="text"
                                                    class="form-control @error('nama_facebook') is-invalid @enderror"
                                                    name="nama_facebook" value="{{ old('nama_facebook', '') }}">
                                            </div>
                                            @error('nama_facebook')
                                                <div class="invalid-feedback">

                                                </div>
                                            @enderror
                                            <div class="form-group">
                                                <label>Url Instagram</label>
                                                <input type="text"
                                                    class="form-control @error('instagram') is-invalid @enderror"
                                                    name="instagram" value="{{ old('instagram', '') }}">
                                            </div>
                                            @error('instagram')
                                                <div class="invalid-feedback">

                                                </div>
                                            @enderror

                                            <div class="form-group">
                                                <label>Nama Instagram</label>
                                                <input type="text"
                                                    class="form-control @error('nama_instagram') is-invalid @enderror"
                                                    name="nama_instagram" value="{{ old('nama_instagram', '') }}">
                                            </div>
                                            @error('nama_instagram')
                                                <div class="invalid-feedback">

                                                </div>
                                            @enderror
                                            <div class="form-group">
                                                <label>Url Twitter</label>
                                                <input type="text"
                                                    class="form-control @error('twitter') is-invalid @enderror"
                                                    name="twitter" value="{{ old('twitter', '') }}">
                                            </div>
                                            @error('twitter')
                                                <div class="invalid-feedback">

                                                </div>
                                            @enderror

                                            <div class="form-group">
                                                <label>Nama Twitter</label>
                                                <input type="text"
                                                    class="form-control @error('nama_twitter') is-invalid @enderror"
                                                    name="nama_twitter" value="{{ old('nama_twitter', '') }}">
                                            </div>
                                            @error('nama_twitter')
                                                <div class="invalid-feedback">

                                                </div>
                                            @enderror
                                            <h4>Modul SEO</h4>

                                            <div class="form-group">
                                                <label>Keywords</label>
                                                <input type="text"
                                                    class="form-control @error('keywords') is-invalid @enderror"
                                                    name="keywords" value="{{ old('keywords', '') }}">
                                            </div>
                                            @error('keywords')
                                                <div class="invalid-feedback">

                                                </div>
                                            @enderror

                                            <div class="form-group">
                                                <label>Meta Text</label>
                                                <input type="text"
                                                    class="form-control @error('meta_text') is-invalid @enderror"
                                                    name="meta_text" value="{{ old('meta_text', '') }}">
                                            </div>
                                            @error('meta_text')
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
