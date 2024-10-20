<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataWargaController extends Controller
{
    // Menampilkan daftar Warga
    public function index()
    {
        return view('admin.data_warga'); // Ganti dengan nama view yang sesuai
    }
}
