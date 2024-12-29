@extends('layouts.adminapp')

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
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Surat</th>
                            <th>Tanggal Pengajuan</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($surat->isEmpty())
                            <tr>
                                <td colspan="9" class="text-center">Tidak ada data surat masuk untuk saat ini.</td>
                            </tr>
                        @else
                            @foreach($surat as $index => $s)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $s->user->nik }}</td>
                                    <td>{{ $s->user->name }}</td>
                                    <td>
                                        @if($s->kategoriSurat)
                                            {{ $s->kategoriSurat->nama_surat }}
                                        @else
                                            <span class="text-muted">Tidak tersedia</span>
                                        @endif
                                    </td>
                                    <td>{{ $s->created_at->format('d-m-Y') }}</td> <!-- Tanggal Pengajuan -->
                                    <td>{{ $s->user->rt->rt }}</td> <!-- Menampilkan nama RT dari relasi -->
                                    <td>{{ $s->user->rt->rw->rw }}</td> <!-- Menampilkan nama RW dari relasi RT -->
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
                                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#uploadDokumenModal{{ $s->id }}">Terima</button>
                                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectionModal" data-id="{{ $s->id }}">Tolak</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!-- Modal LAMPIRAN-->
    @foreach($surat as $s)
    <div class="modal fade" id="modalDetail{{ $s->id }}" tabindex="-1" aria-labelledby="modalDetailLabel{{ $s->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetailLabel{{ $s->id }}">Detail Surat - {{ $s->kategoriSurat->nama_surat ?? 'Tidak Tersedia' }}</h5>
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
<!-- Modal APPROVE-->
    @foreach ($surat as $s)
    <div class="modal fade" id="uploadDokumenModal{{ $s->id }}" tabindex="-1" aria-labelledby="uploadDokumenModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="modal-content">
                <form action="{{ route('surat.upload.dokumen', $s->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadDokumenModalLabel">Upload Dokumen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="dokumen" class="form-label">Pilih Dokumen (PDF/DOCX)</label>
                            <input class="form-control" type="file" name="dokumen" id="dokumen" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
        <script>
            // Tangkap event ketika modal ditampilkan
            const rejectionModal = document.getElementById('rejectionModal');
            rejectionModal.addEventListener('show.bs.modal', function (event) {
                // Tombol yang memicu modal
                const button = event.relatedTarget;
                
                // Ambil data-id dari tombol
                const suratId = button.getAttribute('data-id');
                
                // Perbarui hidden input id di form
                const modalInput = document.getElementById('suratId');
                modalInput.value = suratId;
                
                // Perbarui action form dengan id surat
                const form = document.getElementById('rejectionForm');
                form.action = `{{ url('surat/tolak') }}/${suratId}`;
            });
        </script>
    </div>
    @endforeach
    <!---MODAL ALASAN DITOLAK----->
    @foreach ($surat as $s)
    <div class="modal fade" id="rejectionModal" tabindex="-1" aria-labelledby="rejectionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectionModalLabel">Tolak Surat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="rejectionForm" method="POST" action="{{ route('surat.tolak', $s->id) }}">
                        @csrf
                        <input type="hidden" name="id" id="suratId" value="">
                        <div class="form-group">
                            <label for="reason">Alasan Penolakan</label>
                            <input type="text" name="reason" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-danger">Tolak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#rejectionModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var suratId = button.data('id'); // Extract info from data-* attributes
                var modal = $(this);
                modal.find('#suratId').val(suratId); // Set the surat ID in the hidden input
            });
        });
    </script>
    <script>
        // Cek jika ada session untuk membuka modal
        @if(session('openModal'))
            $(document).ready(function() {
                $('#uploadDokumenModal{{ session('openModal') }}').modal('show');
            });
        @endif
    </script>
    @endforeach
@endsection