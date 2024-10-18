@extends('layouts.wargaapp')

@section('title', 'warga Dashboard')

@section('content')

<div class="page-header">
    <h3 class="page-title">Warga Dashboard</h3>
  </div>
  
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Welcome, {{ auth()->user()->name }}</h4>
          <p>Manage your content from here.</p>
        </div>
      </div>
    </div>
  </div>
@endsection