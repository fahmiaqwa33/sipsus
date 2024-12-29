@extends('layouts.rwapp')

@section('title', 'Surat Masuk')

@section('content')
<div class="container">
    <h3 class="mt-4">Surat Masuk</h3>

    @if(session('success'))
        <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <script>
            // Mengatur timeout untuk menghilangkan notifikasi setelah 2 detik
            setTimeout(function() {
                var alert = document.getElementById('successAlert');
                if (alert) {
                    alert.classList.remove('show');
                    alert.classList.add('fade');
                    // Menghapus elemen setelah animasi selesai
                    setTimeout(function() {
                        alert.remove();
                    }, 150); // Waktu animasi fade-out
                }
            }, 2000); // 2000 ms = 2 detik
        </script>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover rounded-3" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Pengguna</th>
                            <th>Kategori</th>
                            <th>Alamat</th>
                            <th>Alasan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($surat as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td> <!-- Penomoran -->
                                <td>{{ $item->user->name }}</td> <!-- Nama Pengguna -->
                                <td>
                                    @if($item->kategoriSurat)
                                        {{ $item->kategoriSurat->nama_surat }}
                                    @else
                                        <span class="text-muted">Tidak tersedia</span>
                                    @endif
                                </td>
                                <td>{{ $item->alamat }}</td> <!-- Alamat -->
                                <td>{{ $item->alasan }}</td> <!-- Alasan -->
                                <td>
                                    <span class="badge 
                                        @if($item->status == 'disetujui RT') 
                                            bg-success 
                                        @elseif($item->status == 'pending') 
                                            bg-warning 
                                        @elseif($item->status == 'ditolak') 
                                            bg-danger 
                                        @else 
                                            bg-secondary 
                                        @endif">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $item->id }}">
                                            Lihat Detail
                                        </button>
                                        @if($item->status === 'disetujui RT')
                                            <form action="{{ route('surat.terima.rw', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">Terima</button>
                                            </form>
                                        @endif
                                        <form action="{{ route('surat.tolak.rw', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada surat masuk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Section -->
    @foreach($surat as $s)
        <div class="modal fade" id="modalDetail{{ $s->id }}" tabindex="-1" aria-labelledby="modalDetailLabel{{ $s->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDetailLabel{{ $s->id }}">Detail Surat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Detail User -->
                        <p><strong>NIK:</strong> {{ $s->user->nik }}</p>
                        <p><strong>Nama:</strong> {{ $s->user->name }}</p>
                        
                        <!-- Detail Surat -->
                        <p><strong>Jenis Surat:</strong> {{ $s->kategoriSurat->nama_surat ?? 'Tidak tersedia' }}</p>
                        <p><strong>Alamat:</strong> {{ $s->alamat }}</p>
                        <p><strong>Alasan:</strong> {{ $s->alasan }}</p>
                        <p><strong>Tanggal Pengajuan:</strong> {{ $s->created_at->format('d-m-Y') }}</p>
                        
                        <!-- Lampiran -->
                        @if($s->lampiran)
                            <p><strong>Lampiran:</strong> 
                                <a href="{{ asset('storage/' . $s->lampiran) }}" target="_blank">Lihat Lampiran</a>
                            </p>
                            <img src="{{ asset('storage/' . $s->lampiran) }}" alt="Lampiran" class="img-fluid mt-3">
                        @else
                            <p><strong>Lampiran:</strong> Tidak ada lampiran</p>
                        @endif
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
