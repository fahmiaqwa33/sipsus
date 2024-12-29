@extends('layouts.rtapp')

@section('title', 'Data Warga')

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Data Warga</h2>
    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
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
                        @forelse ($dataWarga as $index => $warga)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $warga->name }}</td>
                                <td>{{ $warga->nik }}</td>
                                <td>{{ $warga->rt->rt ?? 'Tidak tersedia' }}</td>
                                <td>{{ $warga->rt->rw->rw ?? 'Tidak tersedia' }}</td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="#" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data warga ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
