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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Team</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-header">
                    <a href="{{ route('staff.create') }}" class="btn btn-outline-success float-right">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                </div>
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
                <div class="card-body pb-0">
                    <div class="row">
                        @forelse ($staff as $key => $data)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-header text-muted border-bottom-0">
                                        {{ $data->jabatan }}
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-8">
                                                <h2 class="lead"><b>{{ $data->nama }}</b></h2>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small my-1"><span class="fa-li"><i
                                                                class="fab fa-lg fa-whatsapp mr-1"></i></span>
                                                        {{ $data->telepon }}</li>
                                                    <li class="small my-1"><span class="fa-li"><i
                                                                class="fab fa-lg fa-instagram mr-1"></i></span>
                                                        {{ $data->instagram }}</li>
                                                    <li class="small my-1"><span class="fa-li"><i
                                                                class="far fa-lg fa-envelope mr-1"></i></span>
                                                        {{ $data->email }}</li>
                                                </ul>
                                                <p class="text-muted text-sm mb-1"><b>Status : </b> {{ $data->status_staff }} </p>
                                                <p class="text-muted text-sm mb-1"><b>Urutan : </b> {{ $data->urutan }} </p>
                                                @can('list-admin')
                                                <p class="text-muted text-sm mb-1"><b>created by / updated by : </b> {{ $data->users->name }} </p>
                                                @endcan
                                            </div>
                                            <div class="col-4 text-center">
                                                <img src="{{ $data->image == null ? asset('admin/dist/img/user_unknown.png') : $data->image_url }}" alt="user-avatar"
                                                    class="img-circle img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="float-right btn-group">
                                            <a href="{{ route('staff.edit', $data->id) }}"
                                                class="btn btn-sm bg-warning mx-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('staff.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                {{-- @method('DELETE') --}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-outline-danger delete" type="button"
                                                    data-id="{{ $data->id }}" data-nama="{{ $data->nama }}"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                            {{-- <a href="{{ route('testimonial.destroy', $data->id) }}"
                                                class="btn btn-sm btn-danger" id="delete">
                                                <i class="fas fa-trash"></i>
                                            </a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <span class="align-items-center my-2 mx-auto">Belum ada data yang tersedia</span>
                        @endforelse
                    </div>
                </div>
                @if ($staff->hasPages())
                    <div class="card-footer">
                        {{ $staff->links() }}
                    </div>
                @endif
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script type="text/javascript">
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
    </script>
@endsection
