<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\RT;
use App\Models\KategoriSurat;
use Illuminate\Support\Facades\Auth;

class PengajuanSuratController extends Controller
{
    public function create()
    {
        // Ambil data kategori surat untuk dipilih oleh pengguna
        $kategoriSurat = KategoriSurat::all();

        // Ambil data RT berdasarkan pengguna yang sedang login
        $dataRt = RT::find(Auth::user()->rt_id);

        // Kirim data kategori surat dan data RT ke view
        return view('warga.ajukan_surat', compact('kategoriSurat', 'dataRt'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string|max:255',
            'kategori_surat' => 'required|exists:kategori_surat,id',
            'alasan' => 'required|string',
            'tanggal' => 'required|date',
            'lampiran' => 'nullable|file'
        ]);
    
        $surat = new Surat();
        $surat->user_id = auth()->id(); // Menyimpan ID pengguna yang sedang login
        $surat->nik = auth()->user()->nik;
        $surat->kategori_surat_id = $request->kategori_surat;
        $surat->alamat = $request->alamat;
        $surat->alasan = $request->alasan;
        $surat->tanggal_pengajuan = $request->tanggal;
    
        // Simpan file lampiran jika ada
        if ($request->hasFile('lampiran')) {
            $filePath = $request->file('lampiran')->store('lampiran', 'public');
            $surat->lampiran = $filePath;
        }
        
    
        $surat->save();

            // Set notifikasi
        session()->flash('success', 'Surat berhasil dikirim!');

    
        return redirect()->route('ajukan-surat.create')->with('success', 'Surat berhasil diajukan');
    }
    
}
