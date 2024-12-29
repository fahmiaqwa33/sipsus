@extends('layouts.rwapp')

@section('title', 'Data RT')

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Data RT</h2>
    <div class="card mb-4">
        <div class="card-header">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif 
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="#" method="GET" class="float-end mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari Nama RT" value="{{ request()->query('search') }}">
                    </div>
                </form>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>RT</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataRT as $index => $rt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $rt->nama_rt }}</td>
                                <td>{{ $rt->rt }}</td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="#" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data RT ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data RT yang ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
