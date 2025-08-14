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
                {{-- <div class="row">
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
        </div> --}}


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
    @if (session('message'))
    <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
    @endif
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
</div>
<!-- /.card -->

<div class="row justify-content-center">
    <div class="col-md-3">

        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                        src="{{ $users->image == null ? asset('admin/dist/img/user_unknown.png') : $users->image_url }}"
                        alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{ $users->name }}</h3>
                <p class="text-muted text-center">{{ $users->email }}</p>

                <div class="row">
                    <div class="col-12 mb-2"><a href="{{ route('user.profile_edit', $users->id) }}"
                            type="button" class="btn btn-outline-warning mx-2 rounded btn-block"><i
                                class="fas fa-edit"></i> <b> Edit</b></a></div>
                    <div class="col-12"><button data-toggle="modal" data-target="#modal-edit"
                            class="btn btn-outline-primary mx-2 rounded btn-block"><i class="fas fa-key"></i>
                            <b> Ganti Password</b></button>
                    </div>
                </div>
            </div>


        </div>

    </div>
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
{{-- @forelse ($users as $key => $item) --}}
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.change_password', $users->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- text input -->
                    <div class="form-group">
                        <label>Password Saat Ini</label><a style="color: red;">*</a>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                            name="current_password">
                    </div>
                    @error('current_password')
                    <div class="invalid-feedback">

                    </div>
                    @enderror

                    <!-- text input -->
                    <div class="form-group">
                        <label>Password</label><a style="color: red;">*</a>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password">
                    </div>
                    @error('password')
                    <div class="invalid-feedback">

                    </div>
                    @enderror

                    <!-- text input -->
                    <div class="form-group">
                        <label>Confirm Password</label><a style="color: red;">*</a>
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
{{-- @empty
    @endforelse --}}
<!-- End of Modal Edit -->
@endsection