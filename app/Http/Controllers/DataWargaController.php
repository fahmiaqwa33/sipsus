<?php

namespace App\Http\Controllers;

use App\Models\DataRW; // Pastikan mengimpor model
use App\Models\RT; // Mengimpor model RT
use App\Models\User; // Mengimpor model User
use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class DataWargaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $sort = $request->query('sort', 'name'); // Kolom default untuk sorting adalah 'name'
        $direction = $request->query('direction', 'asc'); // Arah default adalah 'asc'
    
        // Query untuk mengambil data berdasarkan pencarian dan pengurutan
        $dataWarga = User::with(['rt.rw'])
            ->whereIn('role_id', [2, 3, 4])
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhere('nik', 'like', '%' . $search . '%')
                      ->orWhereHas('rt', fn($q) => $q->where('rt', 'like', '%' . $search . '%'))
                      ->orWhereHas('rt.rw', fn($q) => $q->where('rw', 'like', '%' . $search . '%'));
            })
            ->orderBy($sort, $direction) // Urutkan berdasarkan kolom dan arah yang diinginkan
            ->paginate(10);
    
        return view('admin.data_warga', compact('dataWarga', 'sort', 'direction', 'search'));
    }
    

    public function create()
    {
        $dataRW = DataRW::all(); // Mengambil semua data RW
        $dataRT = RT::all(); // Mengambil semua data RT
    
        // Kirim variabel dataRW dan dataRT ke view
        return view('admin.create_warga', compact('dataRW', 'dataRT'));    }
    // Menyimpan data warga baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|string|max:16|unique:users,nik',
            'password' => 'required|string|min:8',
            'role_id' => 'required|in:2,3,4',
            'rt_id' => 'required|integer',
        ]);

        User::create([
            'name' => $request->name,
            'nik' => $request->nik,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'rt_id' => $request->rt_id,
        ]);

        return redirect()->route('data-warga.index')->with('success', 'Data warga berhasil ditambahkan');
    }
    public function edit($id)
    {
        $warga = User::findOrFail($id);
        $dataRW = DataRW::all();
        $dataRT = RT::all();

        return view('admin.edit_warga', compact('warga', 'dataRW', 'dataRT'));
    }

    public function update(Request $request, $id)
    {
        $warga = User::findOrFail($id);

        // Validasi data yang diterima
        $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'rw_id' => 'required|exists:data_rw,id',
            'rt_id' => 'required|exists:data_rt,id',
            // Tambahkan validasi lainnya jika perlu
        ]);

        // Update data warga
        $warga->update($request->all());

        return redirect()->route('data-warga.index')->with('success', 'Data warga berhasil diupdate.');
    }

    public function destroy($id)
    {
        $warga = User::findOrFail($id);
        $warga->delete();

        return redirect()->route('data-warga.index')->with('success', 'Data warga berhasil dihapus.');
    }

    //Admin RW Controller 

    public function index2()
    {
        // Dapatkan RT yang terkait dengan pengguna yang login
        $user = Auth::user();
        
        // Cari RT yang sesuai dengan rt_id dari user yang login
        $rwId = RT::where('id', $user->rt_id)->value('rw_id');
    
        // Ambil data warga yang berelasi dengan rw_id tersebut
        $dataWarga = User::where('role_id', 4)->whereHas('rt', function($query) use ($rwId) {
            $query->where('rw_id', $rwId);
        })->get();
    
        return view('rw.data_warga', compact('dataWarga'));
    }
    
    //admin RT controller

    public function index3()
    {
        // Ambil data warga yang terkait dengan RT yang sedang login
        $rtId = auth()->user()->rt_id; // Pastikan RT login memiliki relasi
        $dataWarga = User::where('role_id', 4)->where('rt_id', $rtId)->get();

        return view('rt.data_warga', compact('dataWarga'));
    }

}
