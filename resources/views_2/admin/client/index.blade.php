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
                        <li class="breadcrumb-item active">Klien</li>
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
                            <h3 class="card-title">Halaman Klien</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            {{-- <a href="{{ route('testimonial.create') }}" class="btn btn-outline-success float-left">
                            <i class="fas fa-plus"></i> Tambah
                            </a> --}}
                            <button type="button" class="btn btn-outline-success float left" data-toggle="modal"
                                data-target="#modal-add">
                                <i class="fas fa-plus"></i> Tambah
                            </button>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        @can('list-admin')
                                        <th>Created by / Updated by</th>
                                        @endcan
                                        <th>Nama Klien</th>
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @forelse ($klien as $key => $data)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        @can('list-admin')
                                        <td>{{ $data->users->name }}</td>
                                        @endcan
                                        <td>{{ $data->nama }}</td>
                                        <td><img src="{{ $data->image_url }}" class="img-fluid img-thumbnail"
                                                alt="Logo {{ $data->nama }}" title="{{ $data->nama }}"></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-outline-warning mx-2"
                                                    data-toggle="modal"
                                                    data-target="#modal-edit{{ $data->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <form action="{{ route('client.destroy', $data->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    {{-- @method('DELETE') --}}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-outline-danger delete" type="button"
                                                        data-id="{{ $data->id }}"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                                {{-- <button type="button" class="btn btn-outline-danger delete"
                                                            data-id="{{ $data->id }}"
                                                data-nama="{{ $data->nama }}">
                                                <i class="fas fa-trash"></i>
                                                </button> --}}
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Belum Ada Data yang Tersedia</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
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

<!-- Modal Add -->
<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Klien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('client.store') }}" enctype="multipart/form-data">
                    @csrf
                    {{-- <input type="hidden" value="1" name="id_user"> --}}
                    <div class="form-group">
                        <label>Nama</label><a style="color: red;">*</a>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                            value="{{ old('nama', '') }}" placeholder="Masukkan nama klien Anda">
                    </div>
                    @error('nama')
                    <div class="invalid-feedback">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                    @enderror

                    <div class="form-group">
                        <label for="exampleInputFile">Unggah Foto</label><a style="color: red;">*</a>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" id="inputimage" name="image" accept="image/*"
                                    onchange="updatePreview(this, 'image-preview')"
                                    class="custom-file-input  @error('image') is-invalid @enderror">
                                <label class="custom-file-label" for="exampleInputFile">Silahkan Pilih File</label>
                            </div>
                        </div>
                        <p class="mt-2">Foto yang dipilih</p>
                        <img src="{{ asset('admin/dist/img/icon_gallery.png') }}" id="image-preview"
                            class="img-fluid img-thumbnail" style="width: 200px">
                    </div>
                    @error('image')
                    <div class="invalid-feedback">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                    @enderror

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>

    </div>

</div>
<!-- End of Modal Add -->

<!-- Modal Edit -->
@forelse ($klien as $key => $item)
<div class="modal fade" id="modal-edit{{ $item->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Ubah Klien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('client.update', $item->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama Client</label><a style="color: red;">*</a>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                            name="nama" value="{{ old('nama', $item->nama) }}">
                    </div>
                    @error('nama')
                    <div class="invalid-feedback">

                    </div>
                    @enderror

                    <div class="form-group">
                        <label for="exampleInputFile">Unggah Foto</label><a style="color: red;">*</a>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" id="inputimage" name="image" accept="image/*"
                                    onchange="updatePreview(this, 'image-preview')"
                                    class="custom-file-input  @error('image') is-invalid @enderror">
                                <label class="custom-file-label" for="exampleInputFile">Silahkan Pilih
                                    File</label>
                            </div>
                        </div>
                        <p class="mt-2">Foto saat ini</p>
                        <img src="{{ $item->image == null ? asset('admin/dist/img/icon_gallery.png') : $item->image_url }}"
                            id="image-preview" class="img-fluid img-thumbnail" style="width: 200px">
                    </div>
                    @error('image')
                    <div class="invalid-feedback">

                    </div>
                    @enderror

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>

    </div>

</div>
@empty
@endforelse
<!-- End of Modal Edit -->

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