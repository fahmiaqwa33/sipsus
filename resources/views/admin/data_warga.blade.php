@extends('layouts.adminapp')

@section('title', 'Data RT')

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Daftar Data Warga</h2>
    <div class="card mb-4">
        <div class="card-body">       
            <!-- Tombol Tambah Data -->
            <div class="mb-3">
                <a href="#" class="btn btn-success">Tambah Data Warga</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Warga</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(range(1, 10) as $index) <!-- Ganti dengan data yang sesuai -->
                        <tr>
                            <td>{{ $index }}</td>
                            <td>Warga {{ $index }}</td>
                            <td>Alamat {{ $index }}</td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
