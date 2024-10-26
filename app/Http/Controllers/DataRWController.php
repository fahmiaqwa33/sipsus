<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataRW;

class DataRWController extends Controller
{
    public function index(Request $request)
    {
        // Mendapatkan nilai pencarian dan pengurutan dari query string
        $search = $request->query('search');
        $orderBy = $request->query('order_by', 'id'); // Default urutan berdasarkan ID
        $orderDirection = $request->query('order_direction', 'asc'); // Default urutan naik
    
        // Query untuk mendapatkan data RW
        $dataRW = DataRW::when($search, function ($query) use ($search) {
                return $query->where('nama_rw', 'like', '%' . $search . '%')
                             ->orWhere('rw', 'like', '%' . $search . '%');
            })
            ->orderBy($orderBy, $orderDirection) // Mengurutkan berdasarkan kolom yang dipilih
            ->get();
    
        // Oper data ke view dengan pencarian dan pengurutan
        return view('admin.datarw', compact('dataRW', 'orderBy', 'orderDirection'));
    }
    

    public function create()
    {
        return view('admin.create_rw'); // Pastikan untuk membuat view 'create_rw.blade.php'
    }

    public function store(Request $request)
    {
       
        
        $request->validate([
            'nama_rw' => 'required|string|max:255',
            'rw' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
        ]);
    
        DataRW::create([
            'nama_rw' => $request->nama_rw,
            'rw' => $request->rw,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
        ]);
    
        return redirect()->route('admin.datarw.index')->with('success', 'Data RW berhasil ditambahkan.');
    }
    
    public function edit($id)
    {
        $rw = DataRW::findOrFail($id);
        return view('admin.edit_rw', compact('rw'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $request->validate([
            'nama_rw' => 'required|string|max:255',
            'rw' => 'required|string|max:255', // Validasi untuk kolom rw
            'no_hp' => 'nullable|string|max:20', // Validasi untuk kolom no_hp
            'email' => 'nullable|email|max:255', // Validasi untuk kolom email
        ]);

        // Temukan RW berdasarkan ID dan perbarui data
        $rw = DataRW::findOrFail($id);
        $rw->update([
            'nama_rw' => $request->nama_rw,
            'rw' => $request->rw,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.datarw.index')->with('success', 'Data RW berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Temukan RW berdasarkan ID dan hapus
        $rw = DataRW::findOrFail($id);
        $rw->delete();

        return redirect()->route('admin.datarw.index')->with('success', 'Data RW berhasil dihapus.');
    }
}
