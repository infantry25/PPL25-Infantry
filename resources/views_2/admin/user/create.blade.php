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
                        <li class="breadcrumb-item active">Pengaturan Pengguna</li>
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
                            <h3 class="card-title">Form Tambah Pengguna</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label>Nama</label><a style="color: red;">*</a>
                                            <input type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name', '') }}" placeholder="Masukkan nama pengguna">
                                        </div>
                                        @error('name')
                                        <div class="invalid-feedback">

                                        </div>
                                        @enderror

                                        <div class="form-group">
                                            <label>Email</label><a style="color: red;">*</a>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email', '') }}" placeholder="Masukkan email pengguna">
                                        </div>
                                        @error('email')
                                        <div class="invalid-feedback">

                                        </div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="">Roles</label><a style="color: red;">*</a>
                                            <select class="custom-select @error('roles') is-invalid @enderror"
                                                name="roles">
                                                <option selected>-- Pilih Role --</option>
                                                <option value="ADMIN">ADMIN</option>
                                                <option value="USER">USER</option>
                                            </select>
                                        </div>
                                        @error('roles')
                                        <div class="invalid-feedback">

                                        </div>
                                        @enderror

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Password</label><a style="color: red;">*</a>
                                                    <input type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password">
                                                </div>
                                                @error('password')
                                                <div class="invalid-feedback">

                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Confirm Password</label><a style="color: red;">*</a>
                                                    <input type="password" class="form-control"
                                                        name="password_confirmation">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputFile">Photo Profile</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" id="inputimage" name="image"
                                                        accept="image/*" onchange="updatePreview(this, 'image-preview')"
                                                        class="custom-file-input  @error('image') is-invalid @enderror">
                                                    <label class="custom-file-label" for="exampleInputFile">Pilih foto pengguna</label>
                                                </div>
                                            </div>
                                            <img src="{{ asset('admin/dist/img/user_unknown.png') }}" id="image-preview"
                                                class="img-fluid img-thumbnail mt-2" style="width: 200px">
                                        </div>
                                        @error('image')
                                        <div class="invalid-feedback">

                                        </div>
                                        @enderror

                                        <input type="hidden" name="status" value="AKTIF">

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