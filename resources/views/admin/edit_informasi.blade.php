@extends('layouts.adminapp')

@section('title', 'Edit Informasi')

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Edit Informasi</h2>

    <form action="{{ route('admin.informasi.update', $informasi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $informasi->judul }}" required>
        </div>
        <div class="mb-3">
            <label for="konten" class="form-label">Konten</label>
            <textarea class="form-control" id="konten" name="konten" rows="5" required>{{ $informasi->konten }}</textarea>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
            @if ($informasi->gambar)
                <p>Gambar saat ini: <img src="{{ asset('storage/' . $informasi->gambar) }}" width="100"></p>
            @endif
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
