@extends('layouts.adminapp')

@section('title', 'Data RW')

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Data RW</h2> 
    <div class="card mb-4">
        <div class="card-header">
            <a href="#" class="btn btn-success">Tambah Data RW</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>RW</th>
                            <th>Nama RW</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataRW as $index => $rw)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $rw->nama_rw }}</td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
