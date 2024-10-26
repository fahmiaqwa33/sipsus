@extends('layouts.adminapp')

@section('title', 'Tambah Data RT')

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Tambah Data RT</h2>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('data_rt.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_rt" class="form-label">Nama RT</label>
                    <input type="text" class="form-control" id="nama_rt" name="nama_rt" required>
                </div>
                <div class="mb-3">
                    <label for="rw_id" class="form-label">Pilih RW</label>
                    <select class="form-select" id="rw_id" name="rw_id" required>
                        <option value="">Pilih RW</option>
                        @foreach($dataRW as $rw)
                            <option value="{{ $rw->id }}">{{ $rw->rw }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="rt" class="form-label">RT</label>
                    <input type="text" class="form-control" id="rt" name="rt" required>
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">No HP</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>                
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
