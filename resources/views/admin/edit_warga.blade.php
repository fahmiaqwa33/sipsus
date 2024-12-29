@extends('layouts.adminapp')

@section('content')
    <h2>Edit Data Warga</h2>

    <form action="{{ route('data-warga.update', $warga->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama Warga</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $warga->name) }}" required>
        </div>

        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" name="nik" class="form-control" value="{{ old('nik', $warga->nik) }}" required>
        </div>

        <div class="form-group">
            <label for="rw_id">RW</label>
            <select name="rw_id" id="rw_id" class="form-control" required>
                <option value="">Pilih RW</option>
                @foreach($dataRW as $rw)
                    <option value="{{ $rw->id }}" {{ $warga->rw_id == $rw->id ? 'selected' : '' }}>{{ $rw->rw }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="rt_id">RT</label>
            <select name="rt_id" id="rt_id" class="form-control" required>
                <option value="">Pilih RT</option>
                @foreach($dataRT as $rt)
                    <option value="{{ $rt->id }}" data-rw="{{ $rt->rw_id }}" {{ $warga->rt_id == $rt->id ? 'selected' : '' }}>{{ $rt->rt }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Warga</button>
    </form>

    <script>
        // Fungsi untuk filter RT berdasarkan RW yang dipilih
        function filterRT() {
            var selectedRW = document.getElementById('rw_id').value;
            var rtOptions = document.getElementById('rt_id').options;

            for (var i = 0; i < rtOptions.length; i++) {
                var rtOption = rtOptions[i];
                rtOption.style.display = rtOption.getAttribute('data-rw') == selectedRW || rtOption.value == "{{ $warga->rt_id }}" ? 'block' : 'none';
            }
            document.getElementById('rt_id').value = ''; // Reset pilihan RT
        }

        // Tambahkan event listener untuk RW
        document.getElementById('rw_id').addEventListener('change', function () {
            filterRT();
        });

        // Panggil fungsi filterRT pada saat load untuk menampilkan RT yang sesuai
        window.onload = filterRT;
    </script>
@endsection
