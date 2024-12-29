@extends('layouts.rtapp')

@section('title', 'Surat Masuk')

@section('content')
    <h3>Surat Masuk</h3>

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
                            <th>Nama</th>
                            <th>Jenis Surat</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($surat as $index => $s)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $s->user->name }}</td>
                                <td>
                                    @if($s->kategoriSurat)
                                        {{ $s->kategoriSurat->nama_surat }}
                                    @else
                                        <span class="text-muted">Tidak tersedia</span>
                                    @endif
                                </td>
                                <td>{{ $s->created_at->format('d-m-Y') }}</td> <!-- Tanggal Pengajuan -->
                                <td>
                                    <span class="badge 
                                        @if($s->status == 'disetujui RT') 
                                            bg-success 
                                        @elseif($s->status == 'pending') 
                                            bg-warning 
                                        @elseif($s->status == 'ditolak') 
                                            bg-danger 
                                        @else 
                                            bg-secondary 
                                        @endif">
                                        {{ ucfirst($s->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $s->id }}">
                                            Lihat Detail
                                        </button>
                                        <a href="{{ route('surat.terima', $s->id) }}" class="btn btn-success btn-sm">Terima</a>
                                        <a href="{{ route('surat.tolak', $s->id) }}" class="btn btn-danger btn-sm">Tolak</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada surat masuk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
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
                        <p><strong>NIK:</strong> {{ $s->user->nik }}</p>
                        <p><strong>Nama:</strong> {{ $s->user->name }}</p>
                        <p><strong>Jenis Surat:</strong> {{ $s->kategoriSurat->nama_surat ?? 'Tidak tersedia' }}</p>
                        <p><strong>Alamat:</strong> {{ $s->alamat }}</p>
                        <p><strong>Alasan:</strong> {{ $s->alasan }}</p>
                        <p><strong>Tanggal Pengajuan:</strong> {{ $s->created_at->format('d-m-Y') }}</p>
                        @if($s->lampiran)
                            <p><strong>Lampiran:</strong> <a href="{{ asset('storage/' . $s->lampiran) }}" target="_blank">Lihat Lampiran</a></p>
                            <img src="{{ asset('storage/' . $s->lampiran) }}" alt="Lampiran " class="img-fluid mt-3">
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