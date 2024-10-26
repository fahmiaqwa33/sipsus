@extends('layouts.adminapp')

@section('title', 'Data Warga')

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Daftar Data Warga</h2>
    <div class="card mb-4">
        <div class="card-body">       
            <!-- Tombol Tambah Data -->
            <div class="mb-3">
                <a href="{{ route('data-warga.index') }}" class="btn btn-success">Tambah Data Warga</a>
                <form action="#" method="GET" class="float-end">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari Nama Warga/NIK" value="{{ request()->query('search') }}">
                    </div>
                </form>
                <script>
                    document.getElementById('searchInput').addEventListener('input', function() {
                        // Ambil nilai input
                        const query = this.value;
                
                        // Buat URL untuk mengarahkan pencarian
                        const url = new URL('{{ route('data-warga.index') }}"');
                        url.searchParams.set('search', query);
                
                        // Arahkan ke URL baru
                        window.location.href = url;
                    });
                </script>                
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Warga</th>
                            <th>NIK</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataWarga as $index => $warga)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $warga->name }}</td>
                            <td>{{ substr_replace($warga->nik, '******', -6) }}</td> <!-- Sembunyikan 6 angka terakhir -->
                            <td>{{ $warga->rt ? $warga->rt->rt : '-' }}</td> <!-- Nama RT -->
                            <td>{{ $warga->rt && $warga->rt->rw ? $warga->rt->rw->rw : '-' }}</td> <!-- Nama RW -->
                            <td>
                                <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                <form action="#" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
