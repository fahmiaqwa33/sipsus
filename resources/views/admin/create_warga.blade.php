@extends('layouts.adminapp')

@section('content')
    <h2>Tambah Data Warga</h2>

    <form action="{{ route('data-warga.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nama Warga</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" name="nik" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="role_id">Role</label>
            <select name="role_id" class="form-control" required>
                <option value="2">Admin RW</option>
                <option value="3">Admin RT</option>
                <option value="4">Warga</option>
            </select>
        </div>

        <div class="form-group">
            <label for="rw">RW</label>
            <select name="rw_id" id="rw_id" class="form-control" required>
                <option value="">Pilih RW</option>
                @foreach($dataRW as $rw)
                    <option value="{{ $rw->id }}">{{ $rw->rw }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="rt_id">RT</label>
            <select name="rt_id" id="rt_id" class="form-control" required>
                <option value="">Pilih RT</option>
                @foreach($dataRT as $rt)
                    <option value="{{ $rt->id }}" data-rw="{{ $rt->rw_id }}">{{ $rt->rt }}</option>
                @endforeach
            </select>
        </div>
        

        <button type="submit" class="btn btn-primary">Tambah Warga</button>
    </form>

    <script>
        // Opsional: Filter RT berdasarkan RW yang dipilih
        document.getElementById('rw_id').addEventListener('change', function () {
            var selectedRW = this.value;
            var rtOptions = document.getElementById('rt_id').options;

            for (var i = 0; i < rtOptions.length; i++) {
                var rtOption = rtOptions[i];
                rtOption.style.display = rtOption.getAttribute('data-rw') === selectedRW ? 'block' : 'none';
            }
            document.getElementById('rt_id').value = ''; // Reset pilihan RT
        });
    </script>
@endsection
