@extends('layouts.app')

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        {{-- Link ke Tracking --}}
        <div class="text-end mt-4">
            <!-- <p class="mb-2">Sudah pernah mengajukan? Cek status pengajuan Anda di sini:</p> -->
            <a href="{{ route('partnership.tracking') }}" class="btn btn-outline-secondary">Tracking Pengajuan</a>
        </div>
        <h3 class="mb-4">Form Pengajuan Kerjasama</h3>
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('partnership.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Alamat Email">
            </div>
            <div class="mb-3">
                <input type="text" name="perihal" class="form-control" placeholder="Perihal Pengajuan">
            </div>
            <div class="mb-3">
                <input type="file" name="file" class="form-control" accept="application/pdf">
            </div>
            <button type="submit" class="btn btn-primary">Kirim Pengajuan</button>
        </form>


    </div>
</div>
@endsection