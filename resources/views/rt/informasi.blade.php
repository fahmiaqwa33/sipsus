@extends('layouts.rtapp')

@section('title', 'Informasi Terkini')

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Informasi Terkini</h2>
    <h4 class="mt-2">Kelurahan Selomerto</h4>
    <div class="row">
        @foreach ($informasi as $info)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $info->gambar) }}" class="card-img-top" alt="{{ $info->judul }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $info->judul }}</h5>
                        <p class="card-text">
                            {{ Str::limit($info->konten, 100, '...') }}
                            <a href="{{ route('rt.informasi.show', $info->id) }}" class="text-info">Baca Selengkapnya</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @if ($informasi->isEmpty())
        <div class="alert alert-info text-center mt-4">Tidak ada informasi yang ditemukan.</div>
    @endif
</div>
@endsection
