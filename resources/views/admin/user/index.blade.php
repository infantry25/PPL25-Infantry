@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
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
        </div>
    </section>

    <section class="content">

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

            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @elseif ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>

        <div class="row justify-content-center">
            @forelse ($users as $user)
            <div class="col-md-3 mb-4">
                <div class="card card-primary card-outline h-100 d-flex flex-column justify-content-between">
                    <div class="card-body box-profile text-center">
                        <img class="profile-user-img img-fluid img-circle mb-3" style="width: 100px; height: 100px; object-fit: cover;" src="{{ $user->image == null ? asset('admin/dist/img/user_unknown.png') : $user->image_url }}" alt="User profile picture">
                        <h3 class="profile-username">{{ $user->name }}</h3>
                        <p class="text-muted">{{ $user->email }}</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Roles</b> <a class="float-right">{{ $user->roles }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-outline-warning mx-2 rounded">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-outline-danger mx-2 rounded delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p>Tidak ada data pengguna.</p>
            </div>
            @endforelse
        </div>

    </section>
</div>
@endsection