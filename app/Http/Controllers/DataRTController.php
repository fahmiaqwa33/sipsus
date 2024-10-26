<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RT;
use App\Models\DataRW;

class DataRTController extends Controller
{
    public function index(Request $request)
    {
        // Ambil input pencarian
        $search = $request->input('search');

        // Fetch all RT records with search functionality
        if ($search) {
            $dataRT = RT::with('rw')
                ->where('nama_rt', 'like', '%' . $search . '%') // Filter berdasarkan nama RT
                ->orWhereHas('rw', function ($query) use ($search) {
                    $query->where('nama_rw', 'like', '%' . $search . '%'); // Filter berdasarkan nama RW
                })
                ->get();
        } else {
            $dataRT = RT::with('rw')->get(); // Ambil semua data RT beserta relasi RW
        }

        // Pass the data to the view
        return view('admin.data_rt', compact('dataRT'));
    }

    public function create()
    {
        $dataRW = DataRW::all(); // Ambil semua data RW
        return view('admin.create_rt', compact('dataRW')); // Kirim data RW ke view
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'nama_rt' => 'required|string|max:255',
            'rw_id' => 'required|exists:data_rw,id',
            'rt' => 'required|string|max:255', // Validasi untuk kolom rt
            'no_hp' => 'nullable|string|max:15', // Validasi untuk kolom no_hp
            'email' => 'nullable|email|max:255', // Validasi untuk kolom email
        ]);

        // Simpan data ke tabel data_rt
        RT::create([
            'nama_rt' => $request->nama_rt,
            'rw_id' => $request->rw_id,
            'rt' => $request->rt,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.data_rt.index')->with('success', 'Data RT berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Ambil data RT berdasarkan ID
        $rt = RT::findOrFail($id);
        $dataRW = DataRW::all(); // Ambil semua data RW untuk dropdown

        // Kirim data ke view edit
        return view('admin.edit_rt', compact('rt', 'dataRW'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $request->validate([
            'nama_rt' => 'required|string|max:255',
            'rw_id' => 'required|exists:data_rw,id',
            'rt' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
        ]);

        // Update data RT berdasarkan ID
        $rt = RT::findOrFail($id);
        $rt->update([
            'nama_rt' => $request->nama_rt,
            'rw_id' => $request->rw_id,
            'rt' => $request->rt,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.data_rt.index')->with('success', 'Data RT berhasil diupdate.');
    }

    public function destroy($id)
    {
        // Hapus data RT berdasarkan ID
        $rt = RT::findOrFail($id);
        $rt->delete();

        return redirect()->route('admin.data_rt.index')->with('success', 'Data RT berhasil dihapus.');
    }
}
