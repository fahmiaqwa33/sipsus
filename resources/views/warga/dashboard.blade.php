@extends('layouts.wargaapp')

@section('title', 'Dashboard Warga')

@section('content')
<div class="container-fluid">
  <div class="row">
      <div class="col-lg-12">
          <div class="card shadow-sm mt-4">
              <div class="card-body">
                  <h2 class="card-title">Selamat Datang, {{ auth()->user()->nama }}</h2>
                  <p class="card-text">Silakan pilih menu di bawah ini untuk melanjutkan.</p>
                  <div class="mt-4">
                      <a href="{{ route('ajukan-surat.create') }}" class="btn btn-primary btn-lg">Ajukan Surat</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
