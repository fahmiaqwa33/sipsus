@extends('layouts.adminapp')

@section('title', 'Data RT')

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Data RT</h2> 
    <div class="card mb-4">
        <div class="card-header">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="mb-3">
                    <a href="{{ route('data_rt.create') }}" class="btn btn-success">Tambah Data RT</a>
                    <form action="{{ route('admin.data_rt.index') }}" method="GET" class="mb-3 float-end" id="searchForm">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari Nama RT atau RW" value="{{ request()->query('search') }}" id="searchInput">
                        </div>
                    </form>
                    
                    <script>
                        document.getElementById('searchInput').addEventListener('input', function() {
                            // Ambil nilai input
                            const query = this.value;
                    
                            // Buat URL untuk mengarahkan pencarian
                            const url = new URL('{{ route('admin.data_rt.index') }}');
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
                            <th>Nama RT</th>
                            <th>RT</th> <!-- Menambahkan kolom RT -->
                            <th>No HP</th> <!-- Menambahkan kolom No HP -->
                            <th>Email</th> <!-- Menambahkan kolom Email -->
                            <th>RW</th> <!-- Menambahkan kolom RW -->
                            <th>Nama RW</th> <!-- Menambahkan kolom Nama RW -->
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataRT as $rt)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $rt->nama_rt }}</td>
                            <td>{{ $rt->rt }}</td> <!-- Menampilkan kolom RT -->
                            <td>{{ $rt->no_hp }}</td> <!-- Menampilkan kolom No HP -->
                            <td>{{ $rt->email }}</td> <!-- Menampilkan kolom Email -->
                            <td>{{ $rt->rw_id }}</td> <!-- Menampilkan ID RW -->
                            <td>{{ $rt->rw->nama_rw }}</td> <!-- Menampilkan Nama RW dari relasi -->
                            <td>
                                <a href="{{ route('data_rt.edit', $rt->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('data_rt.destroy', $rt->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
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
