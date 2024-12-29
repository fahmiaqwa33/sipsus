@extends('layouts.wargaapp')

@section('title', 'Ajukan Surat')

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Formulir Pengajuan Surat</h2>
    @if(session('success'))
    <div class="alert alert-success" id="successMessage" role="alert">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('successMessage').style.display = 'none';
        }, 5000); 
    </script>
@endif
    <div class="card shadow-sm mt-4">
        <div class="card-body">
            <form action="{{ route('ajukan-surat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div class="form-group">
                    <label for="nama">Nama*</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ auth()->user()->name }}" readonly>
                </div>
                
                <div class="form-group">
                    <label for="NIK">NIK*</label>
                    <input type="text" class="form-control" id="NIK" name="NIK" value="{{ auth()->user()->nik }}" readonly>
                </div>
                
                <div class="form-group">
                    <label for="rt">RT*</label>
                    <input type="text" class="form-control" id="rt" name="rt" value="{{ $dataRt ? $dataRt->rt : 'Tidak tersedia' }}" readonly>
                </div>
                
                <div class="form-group">
                    <label for="rw">RW*</label>
                    <input type="text" class="form-control" id="rw" name="rw" value="{{ $dataRt && $dataRt->rw_id ? $dataRt->rw_id : 'Tidak tersedia' }}" readonly>
                </div>
            
                <div class="form-group">
                    <label for="alamat">Alamat Lengkap</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" required>
                </div>
                
                <div class="form-group">
                    <label for="kategori_surat">Kategori Surat</label>
                    <select class="form-control" id="kategori_surat" name="kategori_surat" required>
                        <option value="" disabled selected>Pilih Kategori Surat</option>
                        @foreach ($kategoriSurat as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_surat }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="alasan">Alasan Pengajuan Surat</label>
                    <textarea class="form-control" id="alasan" name="alasan" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="lampiran">Lampiran (File.jpg/png)</label>
                    <input type="file" class="form-control" id="lampiran" name="lampiran">
                </div>
            
                <div class="form-group">
                    <label for="tanggal">Tanggal Pengajuan</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Ajukan Surat</button>
            </form>

        </div>
    </div>
</div>
@endsection