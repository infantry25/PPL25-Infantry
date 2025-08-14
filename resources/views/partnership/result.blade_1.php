@extends('layouts.app')

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <h3 class="mb-4">Hasil Tracking</h3>

        @if($partnership)
        <p><strong>Status:</strong> {{ $partnership->status }}</p>
        <p><strong>Keterangan:</strong> {{ $partnership->keterangan ?? '-' }}</p>
        @else
        <p class="text-danger">Tiket tidak ditemukan.</p>
        @endif

        <a href="{{ route('partnership.tracking') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection