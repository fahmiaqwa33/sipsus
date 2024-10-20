@extends('layouts.adminapp')

@section('title', 'Data RT')

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Data RT</h2>
    <div class="card mb-4">
        <div class="card-header">
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="#" class="btn btn-success">Tambah Data RT</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>RT</th>
                            <th>Nama RT</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataRT as $index => $rt)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $rt->nama_rt }}</td> <!-- Change to nama_rt from RT model -->
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
