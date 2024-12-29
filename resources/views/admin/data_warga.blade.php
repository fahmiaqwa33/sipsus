@extends('layouts.adminapp')

@section('title', 'Data Warga')

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Daftar Data Warga</h2>
    <div class="card mb-4">
        <div class="card-body">
            <!-- Tombol Tambah Data -->
            <div class="mb-3">
                <a href="{{ route('data-warga.create') }}" class="btn btn-success">Tambah Data Warga</a>
                <form action="{{ route('data-warga.index') }}" method="GET" class="float-end">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari Nama Warga/NIK/RT/RW" value="{{ $search }}">
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>
                                <a href="{{ route('data-warga.index', ['sort' => 'name', 'direction' => $sort === 'name' && $direction === 'asc' ? 'desc' : 'asc']) }}">
                                    Nama Warga
                                    @if($sort === 'name')
                                        <i class="mdi mdi-arrow-{{ $direction === 'asc' ? 'down' : 'up' }}"></i>
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a href="{{ route('data-warga.index', ['sort' => 'nik', 'direction' => $sort === 'nik' && $direction === 'asc' ? 'desc' : 'asc']) }}">
                                    NIK
                                    @if($sort === 'nik')
                                        <i class="mdi mdi-arrow-{{ $direction === 'asc' ? 'down' : 'up' }}"></i>
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a href="{{ route('data-warga.index', ['sort' => 'rt', 'direction' => $sort === 'rt' && $direction === 'asc' ? 'desc' : 'asc']) }}">
                                    RT
                                    @if($sort === 'rt')
                                        <i class="mdi mdi-arrow-{{ $direction === 'asc' ? 'down' : 'up' }}"></i>
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a href="{{ route('data-warga.index', ['sort' => 'rw', 'direction' => $sort === 'rw' && $direction === 'asc' ? 'desc' : 'asc']) }}">
                                    RW
                                    @if($sort === 'rw')
                                        <i class="mdi mdi-arrow-{{ $direction === 'asc' ? 'down' : 'up' }}"></i>
                                    @endif
                                </a>
                            </th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataWarga as $index => $warga)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $warga->name }}</td>
                            <td>{{ substr_replace($warga->nik, '******', -6) }}</td>
                            <td>{{ $warga->rt ? $warga->rt->rt : '-' }}</td>
                            <td>{{ $warga->rt && $warga->rt->rw ? $warga->rt->rw->rw : '-' }}</td>
                            <td>
                                <a href="{{ route('data-warga.edit', $warga->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('data-warga.destroy', $warga->id) }}" method="POST" style="display:inline;">
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
            <div class="d-flex justify-content-center mt-4">
                {{ $dataWarga->appends(['search' => $search, 'sort' => $sort, 'direction' => $direction])->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
