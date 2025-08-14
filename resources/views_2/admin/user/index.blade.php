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
                            <li class="breadcrumb-item active">Pengaturan Pengguna</li>
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
                    <div class="row">
                        <div class="col-md-6">
                            @if ($users->hasPages())
                                    {{ $users->links() }}
                            @endif
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('user.create') }}" class="btn btn-outline-success float-right">
                                <i class="fas fa-plus"></i> Tambah
                            </a>
                        </div>
                    </div>


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
            </div>
            <!-- /.card -->

            <div class="row justify-content-center">
                @forelse ($users as $key => $user)
                    <div class="col-md-3">

                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ $user->image == null ? asset('admin/dist/img/user_unknown.png') : $user->image_url }}"
                                        alt="User profile picture">
                                </div>
                                <h3 class="profile-username text-center">{{ $user->name }}</h3>
                                <p class="text-muted text-center">{{ $user->email }}</p>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Roles</b> <a class="float-right">{{ $user->roles }}</a>
                                    </li>
                                    {{-- <li class="list-group-item">
                                    <b>Following</b> <a class="float-right">543</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Friends</b> <a class="float-right">13,287</a>
                                </li> --}}
                                </ul>
                                {{-- <div class="row">
                                <div class="col-6"><a href="#" class="btn btn-primary btn-block"><b>Follow</b></a></div>
                                <div class="col-6"><a href="#" class="btn btn-primary btn-block"><b>Follow</b></a></div>
                            </div> --}}
                                <div class="btn-group" style="text-align:center">
                                    {{-- <button type="button" class="btn btn-outline-success mx-2 rounded"
                                        data-toggle="modal"
                                        data-target="#modal-edit{{ $user->id }}">
                                        <i class="fas fa-key"></i>
                                    </button> --}}
                                    <a href="{{ route('user.edit', $user->id) }}" type="button"
                                        class="btn btn-outline-warning mx-2 rounded">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                        class="mx-2 rounded">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-outline-danger delete" type="button" data-id=""
                                            data-toggle="tooltip" title='Delete'><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>


                        </div>

                    </div>
                @empty
                @endforelse
            </div>


        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
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

    <!-- Modal Edit -->
    {{-- @forelse ($users as $key => $item)
        <div class="modal fade" id="modal-edit{{ $item->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Password</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('user.password', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- text input -->
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password">
                            </div>
                            @error('password')
                                <div class="invalid-feedback">

                                </div>
                            @enderror
                            <!-- text input -->
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>

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
    @endforelse --}}
    <!-- End of Modal Edit -->
@endsection
