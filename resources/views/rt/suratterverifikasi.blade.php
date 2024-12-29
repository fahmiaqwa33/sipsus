@extends('layouts.rtapp')

@section('title', 'Surat Terverifikasi')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Surat Terverifikasi</h3>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Pengguna</th>
                            <th>Jenis Surat</th>
                            <th>Alamat</th>
                            <th>Alasan</th>
                            <th>Status</th>
                            <th>Tanggal Verifikasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($surat as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ optional($item->user)->name ?? 'N/A' }}</td>
                                <td>{{ optional($item->kategoriSurat)->nama_surat ?? '-' }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->alasan }}</td>
                                <td>
                                    <span class="badge bg-success">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td>{{ $item->updated_at->format('d-m-Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada surat terverifikasi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection