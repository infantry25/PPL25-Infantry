@extends('layouts.app')

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <h3 class="mb-4">Tracking Pengajuan Kerjasama</h3>

        <form action="{{ route('partnership.check') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="text" name="kode_tiket" class="form-control" placeholder="Masukkan Kode Tiket">
            </div>
            <button type="submit" class="btn btn-primary">Cek Status</button>
        </form>
    </div>
</div>
@endsection