<?php

namespace App\Http\Controllers;

use App\Models\DataRW; // Import model DataRW
use Illuminate\Http\Request;

class DataRWController extends Controller
{
    public function index()
    {
        // Ambil data dari tabel data_rw
        $dataRW = DataRW::all();

        // Kirim data ke view
        return view('admin.datarw', compact('dataRW'));
    }
}
