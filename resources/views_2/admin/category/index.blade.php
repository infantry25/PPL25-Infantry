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
                        <li class="breadcrumb-item active">Kategori</li>
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
                            <h3 class="card-title">Halaman Kategori</h3>
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
                                        <th>Nama Kategori</th>
                                        <th>Slug</th>
                                        <th>Urutan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @forelse ($kategori as $key => $data)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $data->nama_kategori }}</td>
                                        <td>{{ $data->slug_kategori }}</td>
                                        <td>{{ $data->urutan }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-outline-warning mx-2"
                                                    data-toggle="modal"
                                                    data-target="#modal-edit{{ $data->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <form action="{{ route('category.destroy', $data->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    {{-- @method('DELETE') --}}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-outline-danger delete" type="button"
                                                        data-id="{{ $data->id }}"
                                                        data-nama="{{ $data->nama_kategori }}"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                                {{-- <button type="button" class="btn btn-outline-danger delete"
                                                            data-id="{{ $data->id }}"
                                                data-nama="{{ $data->nama_kategori }}">
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
                <h4 class="modal-title">Form Tambah Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama Kategori</label><a style="color: red;">*</a>
                        <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror"
                            name="nama_kategori" placeholder="Masukkan nama kategori">
                    </div>
                    @error('nama_kategori')
                    <div class="invalid-feedback">

                    </div>
                    @enderror

                    <div class="form-group">
                        <label>Urutan</label><a style="color: red;">*</a>
                        <input type="number" class="form-control @error('urutan') is-invalid @enderror" name="urutan"
                            placeholder="Masukkan nomor urutan">
                    </div>
                    @error('urutan')
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
<!-- End of Modal Add -->

<!-- Modal Edit -->
@forelse ($kategori as $key => $item)
<div class="modal fade" id="modal-edit{{ $item->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('category.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama Kategori</label><a style="color: red;">*</a>
                        <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror"
                            name="nama_kategori" value="{{ old('nama_kategori', $item->nama_kategori) }}">
                    </div>
                    @error('nama_kategori')
                    <div class="invalid-feedback">

                    </div>
                    @enderror

                    <div class="form-group">
                        <label>Urutan</label><a style="color: red;">*</a>
                        <input type="number" class="form-control @error('urutan') is-invalid @enderror"
                            name="urutan" value="{{ old('urutan', $item->urutan) }}">
                    </div>
                    @error('urutan')
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

<!-- Modal Edit -->
@forelse ($kategori as $key => $item)
<div class="modal fade" id="modal-delete{{ $item->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Form Tambah Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data ini ?
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="{{ route('category.destroy', $item->id) }}" type="submit"
                    class="btn btn-primary">Save</a>
            </div>
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