@extends('layouts.adminapp')

@section('title', 'Edit Data RT')

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Edit Data RT</h2>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('data_rt.update', $rt->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_rt" class="form-label">Nama RT</label>
                    <input type="text" class="form-control" id="nama_rt" name="nama_rt" value="{{ $rt->nama_rt }}" required>
                </div>
                <div class="mb-3">
                    <label for="rt" class="form-label">RT</label>
                    <input type="text" class="form-control" id="rt" name="rt" value="{{ $rt->rt }}" required>
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">No HP</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $rt->no_hp }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $rt->email }}" required>
                </div>
                <div class="mb-3">
                    <label for="rw_id" class="form-label">Pilih RW</label>
                    <select class="form-select" id="rw_id" name="rw_id" required>
                        <option value="">Pilih RW</option>
                        @foreach($dataRW as $rw)
                            <option value="{{ $rw->id }}" {{ $rt->rw_id == $rw->id ? 'selected' : '' }}>
                                {{ $rw->rw }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
