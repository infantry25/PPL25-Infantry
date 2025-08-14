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
                                <h3 class="card-title">Form Ubah Pengguna</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form method="POST" action="{{ route('user.update', $users->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name', $users->name) }}"
                                                    placeholder="Masukkan nama pengguna">
                                            </div>
                                            @error('name')
                                                <div class="invalid-feedback">

                                                </div>
                                            @enderror

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email', $users->email) }}"
                                                    placeholder="Masukkan email pengguna">
                                            </div>
                                            @error('email')
                                                <div class="invalid-feedback">

                                                </div>
                                            @enderror

                                            <div class="form-group">
                                                <label for="">Roles</label>
                                                <select class="custom-select @error('roles') is-invalid @enderror"
                                                    name="roles">
                                                    <option value="ADMIN" @if ($users->roles === 'ADMIN') selected @endif>ADMIN</option>
                                                    <option value="USER" @if ($users->roles === 'USER') selected @endif>USER</option>
                                                </select>
                                            </div>
                                            @error('roles')
                                                <div class="invalid-feedback">

                                                </div>
                                            @enderror

                                            <div class="form-group">
                                                <label for="">Status</label>
                                                <select class="custom-select @error('status') is-invalid @enderror"
                                                    name="status">
                                                    <option value="AKTIF" @if ($users->status === 'AKTIF') selected @endif>AKTIF</option>
                                                    <option value="TIDAK AKTIF" @if ($users->status === 'TIDAK AKTIF') selected @endif>TIDAK AKTIF</option>
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
                                                        <label>Password</label>
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
                                                        <label>Confirm Password</label>
                                                        <input type="password" class="form-control" name="password_confirmation">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputFile">Unggah Foto</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" id="inputimage" name="image"
                                                            accept="image/*" onchange="updatePreview(this, 'image-preview')"
                                                            class="custom-file-input  @error('image') is-invalid @enderror">
                                                        <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                                                    </div>
                                                </div>
                                                {{-- @if (!empty($users->image_url))
                                                <img src="{{ {{ $user->image == null ? asset('admin/dist/img/user_unknown.png') : $user->image_url }} }}" id="image-preview"
                                                class="img-fluid img-thumbnail mt-2" style="width: 200px">
                                                @else
                                                <img src="{{ asset('admin/dist/img/user_unknown.png') }}" id="image-preview"
                                                class="img-fluid img-thumbnail mt-2" style="width: 200px">
                                                @endif --}}

                                                <img src="{{ $users->image == null ? asset('admin/dist/img/user_unknown.png') : $users->image_url }}" id="image-preview"
                                                class="img-fluid img-thumbnail mt-2" style="width: 200px">
                                                <p class="mt-1">Foto profil saat ini</p>
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
