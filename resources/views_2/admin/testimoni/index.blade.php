@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{$title}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Testimoni</li>
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
                    <a href="{{ route('testimonial.create') }}" class="btn btn-outline-success float-right">
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
                        @forelse ($testimoni as $key => $testi)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-header text-muted border-bottom-0">
                                        {{ $testi->pekerjaan }}
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="lead"><b>{{ $testi->nama }}</b></h2>
                                                <p class="text-muted text-sm"><b>Komentar : </b> {{ $testi->komentar }} </p>
                                                @can('list-admin')
                                                <p class="text-muted text-sm mb-1"><b>created by / updated by: </b> {{ $testi->users->name }} </p>
                                                @endcan
                                            </div>
                                            <div class="col-5 text-center">
                                                <img src="{{ $testi->image  == null ? asset('admin/dist/img/user_unknown.png') : $testi->image_url }}" alt="user-avatar"
                                                    class="img-circle img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="float-right btn-group">
                                            <a href="{{ route('testimonial.edit', $testi->id) }}"
                                                class="btn btn-sm bg-warning mx-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('testimonial.destroy', $testi->id) }}"
                                                method="POST">
                                                @csrf
                                                {{-- @method('DELETE') --}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-outline-danger delete" type="button"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                            {{-- <a href="{{ route('testimonial.destroy', $testi->id) }}"
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
                @if ($testimoni->hasPages())
                    <div class="card-footer">
                        {{ $testimoni->links() }}
                    </div>
                @endif
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
