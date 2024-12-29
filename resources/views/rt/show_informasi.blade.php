@extends('layouts.rtapp')

@section('title', 'Detail Informasi RT')

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">{{ $informasi->judul }}</h2>
    <img src="{{ asset('storage/' . $informasi->gambar) }}" class="img-fluid mb-3" alt="Gambar Informasi">
    <p>{{ $informasi->konten }}</p>
    <a href="{{ route('rt.informasi.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection