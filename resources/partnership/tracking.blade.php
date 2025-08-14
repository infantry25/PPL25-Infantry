@extends('layouts.app')

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <h3 class="mb-4">Tracking Pengajuan Kerjasama</h3>

        {{-- Form input kode tiket --}}
        <form action="{{ route('partnership.check') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="text" name="kode_tiket" class="form-control" placeholder="Masukkan Kode Tiket" value="{{ old('kode_tiket') }}">
                @error('kode_tiket')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Cek Status</button>
        </form>

        {{-- Hasil tracking (jika ada) --}}
        @isset($partnership)
        <hr class="my-4">
        <h5>Hasil Tracking:{{ $partnership->kode_tiket }}</h5>
        <p><strong>Status:</strong> {{ $partnership->status }}</p>
        <p><strong>Updated Date:</strong> {{ $partnership->updated_at ?? '-' }}</p>
        <p><strong>Keterangan:</strong> {{ $partnership->keterangan ?? '-' }}</p>
        @elseif(session('not_found'))
        <hr class="my-4">
        <p class="text-danger">{{ session('not_found') }}</p>
        @endisset
    </div>
</div>
@endsection