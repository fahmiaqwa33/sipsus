<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DataWargaController extends Controller
{
    public function index(Request $request)
    {
        // Ambil input pencarian dari query string
        $search = $request->query('search');

        // Jika ada input pencarian, filter berdasarkan nama warga atau NIK
        if ($search) {
            $dataWarga = User::with(['rt.rw'])
                ->where('role_id', 4) // Hanya warga
                ->where(function($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                          ->orWhere('nik', 'like', '%' . $search . '%');
                })
                ->get();
        } else {
            // Jika tidak ada pencarian, ambil semua data warga
            $dataWarga = User::with(['rt.rw'])->where('role_id', 4)->get(); // Hanya warga
        }

        // Kirim data ke view
        return view('admin.data_warga', compact('dataWarga'));
    }
}
