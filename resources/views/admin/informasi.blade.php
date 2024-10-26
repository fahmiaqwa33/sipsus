@extends('layouts.adminapp')

@section('title', 'Informasi Kelurahan')

@section('content')
<div class="container-fluid">
        <h2 class="mt-4">Informasi Terkini </h2>
        <h4 class="mt-8">Kelurahan Selomerto</h3>
        <a href="{{ route('admin.informasi.create') }}" class="btn btn-primary mb-3">Tambah Berita</a>
        <div class="row">
            @foreach ($informasi as $info)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $info->gambar) }}" class="card-img-top" alt="Gambar Informasi" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $info->judul }}</h5>
                            <p class="card-text">
                                {{ Str::limit($info->konten, 100, '...') }}
                                <a href="{{ route('admin.informasi.show', $info->id) }}" class="text-info">Baca Selengkapnya</a>
                            </p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.informasi.edit', $info->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('admin.informasi.destroy', $info->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
