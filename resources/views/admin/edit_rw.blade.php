@extends('layouts.adminapp')

@section('title', 'Edit Data RW')

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Edit Data RW</h2>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('datarw.update', $rw->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_rw" class="form-label">Nama RW</label>
                    <input type="text" class="form-control" id="nama_rw" name="nama_rw" value="{{ $rw->nama_rw }}" required>
                </div>
                <div class="mb-3">
                    <label for="rw" class="form-label">RW</label>
                    <input type="text" class="form-control" id="rw" name="rw" value="{{ $rw->rw }}" required>
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">No HP</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $rw->no_hp }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $rw->email }}">
                </div>
                <button type="submit" class="btn btn-primary">Perbarui</button>
            </form>
        </div>
    </div>
</div>
@endsection
