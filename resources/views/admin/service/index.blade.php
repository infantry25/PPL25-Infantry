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
                            <h3 class="card-title">Halaman Layanan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            {{-- <a href="{{ route('testimonial.create') }}" class="btn btn-outline-success float-left">
                            <i class="fas fa-plus"></i> Tambah
                            </a> --}}
                            <a href="{{ route('service.create') }}" type="button"
                                class="btn btn-outline-success float left">
                                <i class="fas fa-plus"></i> Tambah
                            </a>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        @can('list-admin')
                                        <th>Created by / Updated by</th>
                                        @endcan
                                        <th>Nama Kategori</th>
                                        <th>Tagline</th>
                                        <th>Ringkasan</th>
                                        <th>Deskripsi</th>
                                        <th>Icon</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @forelse ($services as $key => $service)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        @can('list-admin')
                                        <td>{{ $service->users->name }}</td>
                                        @endcan
                                        <td>{{ $service->categories->nama_kategori }}</td>
                                        <td>{{ $service->tagline }}</td>
                                        <td>{{ $service->ringkasan }}</td>
                                        <td>{!! $service->deskripsi !!}</td>
                                        <td>{!! $service->icon !!}</td>
                                        <td><img src="{{ $service->image_url }}" class="img-fluid" alt="">
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{ route('service.edit', $service->id) }}" type="button"
                                                    class="btn btn-outline-warning mx-2">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('service.destroy', $service->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-outline-danger delete" type="submit"
                                                        data-id="{{ $service->id }}" data-toggle="tooltip"
                                                        title='Delete'><i class="fas fa-trash"></i></button>

                                                    <!-- <button class="btn btn-outline-danger delete" type="button"
                                                        data-id="{{ $service->id }}" data-toggle="tooltip"
                                                        title='Delete'><i class="fas fa-trash"></i></button> -->
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Belum Ada Data yang Tersedia</td>
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