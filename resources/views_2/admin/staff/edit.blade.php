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
                        <li class="breadcrumb-item active">Staff</li>
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
                            <h3 class="card-title">Form Tambah Staff</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('staff.update', $staff->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <input type="hidden" value="{{ old('1', $staff->id_user) }}" name="id_user">
                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label>Nama</label><a style="color: red;">*</a>
                                            <input type="text"
                                                class="form-control @error('nama') is-invalid @enderror" name="nama"
                                                value="{{ old('nama', $staff->nama) }}"
                                                placeholder="Masukkan Nama Team">
                                        </div>
                                        @error('nama')
                                        <div class="invalid-feedback">

                                        </div>
                                        @enderror

                                        <div class="form-group">
                                            <label>Jabatan</label><a style="color: red;">*</a>
                                            <input type="text"
                                                class="form-control @error('jabatan') is-invalid @enderror"
                                                name="jabatan" value="{{ old('jabatan', $staff->jabatan) }}"
                                                placeholder="Masukkan Nama Jabatan">
                                        </div>
                                        @error('jabatan')
                                        <div class="invalid-feedback">

                                        </div>
                                        @enderror

                                        <div class="form-group">
                                            <label>Email</label><a style="color: red;">*</a>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email', $staff->email) }}" placeholder="Masukkan Email">
                                        </div>
                                        @error('email')
                                        <div class="invalid-feedback">

                                        </div>
                                        @enderror

                                        <div class="form-group">
                                            <label>Instagram</label>
                                            <input type="text"
                                                class="form-control @error('instagram') is-invalid @enderror"
                                                name="instagram" value="{{ old('instagram', $staff->instagram) }}"
                                                placeholder="Masukkan Url Instagram">
                                        </div>
                                        @error('instagram')
                                        <div class="invalid-feedback">

                                        </div>
                                        @enderror

                                        <div class="form-group">
                                            <label>Telepon</label>
                                            <input type="number"
                                                class="form-control @error('telepon') is-invalid @enderror"
                                                name="telepon" value="{{ old('telepon', $staff->telepon) }}"
                                                placeholder="Masukkan No. Telepon">
                                        </div>
                                        @error('telepon')
                                        <div class="invalid-feedback">

                                        </div>
                                        @enderror

                                        <div class="form-group">
                                            <label>Urutan</label><a style="color: red;">*</a>
                                            <input type="number"
                                                class="form-control @error('urutan') is-invalid @enderror"
                                                name="urutan" value="{{ old('urutan', $staff->urutan) }}"
                                                placeholder="Masukkan Urutan Team">
                                        </div>
                                        @error('urutan')
                                        <div class="invalid-feedback">

                                        </div>
                                        @enderror

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Status</label><a style="color: red;">*</a>
                                            <select name="status_staff" id="exampleFormControlSelect1"
                                                class="form-control">
                                                {{-- <option value="{{ $staff->status_staff }}"
                                                {{ old('status_staff', $staff->status_staff) == '' ? 'selected' : '' }}>
                                                {{ $staff->status_staff }}</option> --}}

                                                <option value="AKTIF" @if ($staff->status_staff === 'AKTIF' ) selected

                                                    @endif>AKTIF</option>
                                                <option value="TIDAK AKTIF" @if ($staff->status_staff === 'TIDAK AKTIF' ) selected

                                                    @endif>TIDAK AKTIF</option>
                                            </select>
                                        </div>
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
                                            <p class="mt-2">Foto saat ini</p>
                                            <img src="{{ $staff->image == null ? asset('admin/dist/img/user_unknown.png') : $staff->image_url }}" class="img-fluid img-thumbnail"
                                                style="width: 200px">
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