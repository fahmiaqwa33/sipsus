@extends('layouts.adminapp')

@section('title', 'Data RW')

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Data RW</h2> 
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
                <div class="mb-3">
                    <a href="{{ route('datarw.create') }}" class="btn btn-success">Tambah Data RW</a>
                        <form action="{{ route('admin.datarw.index') }}" method="GET" class="mb-3 float-end" id="searchForm">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari Nama RW" value="{{ request()->query('search') }}" id="searchInput">
                            </div>
                        </form>
                <script>
                    document.getElementById('searchInput').addEventListener('input', function() {
                        // Ambil nilai input
                        const query = this.value;
                
                        // Buat URL untuk mengarahkan pencarian
                        const url = new URL('{{ route('admin.datarw.index') }}');
                        url.searchParams.set('search', query);
                
                        // Arahkan ke URL baru
                        window.location.href = url;
                    });
                </script>  
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama RW</th>
                            <th>RW</th>
                            <th>No HP</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataRW as $index => $rw)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $rw->nama_rw }}</td>
                            <td>{{ $rw->rw }}</td>
                            <td>{{ $rw->no_hp }}</td> <!-- Pastikan no_hp ada di model -->
                            <td>{{ $rw->email }}</td>  <!-- Pastikan email ada di model -->
                            <td>
                                <a href="{{ route('datarw.edit', $rw->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('datarw.destroy', $rw->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                </form>
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
