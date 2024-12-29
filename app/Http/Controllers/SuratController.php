<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; // Pastikan ini ada
use App\Models\Surat;
use App\Models\DokumenSurat;
use Illuminate\Support\Facades\Auth;

class SuratController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Ambil surat yang memiliki user_id yang berelasi dengan rt_id pengguna
        if ($user->role_id == 3) { // Role RT
            $surat = Surat::whereHas('user', function ($query) use ($user) {
                $query->where('rt_id', $user->rt_id); // Filter berdasarkan rt_id pengguna
            })->whereIn('status', ['pending', 'disetujui RT']) // Filter untuk status 'pending' dan 'disetujui RT'
            ->get();
        } else {
            // Jika bukan RT, tidak ada surat yang ditampilkan
            $surat = collect(); // Mengembalikan koleksi kosong
        }
    
        return view('rt.suratmasuk', compact('surat'));
    }
    public function terima($id)
    {
        // Cari surat berdasarkan ID
        $surat = Surat::findOrFail($id);
    
        // Cek jika surat statusnya masih 'pending'
        if ($surat->status === 'pending') {
            // Ubah status surat menjadi 'disetujui RT'
            $surat->update(['status' => 'disetujui RT']);
        }
    
        // Redirect ke halaman surat masuk dengan pesan sukses
        return redirect()->route('surat.masuk')->with('success', 'Surat berhasil diterima dan disetujui RT.');
    }

    public function tolak($id)
    {
        // Cari surat berdasarkan ID
        $surat = Surat::findOrFail($id);

        // Ubah status surat menjadi 'ditolak'
        if ($surat->status === 'pending') {
            $surat->update(['status' => 'ditolak RT']);
        }

        // Redirect ke halaman surat masuk dengan pesan sukses
        return redirect()->route('surat.masuk')->with('success', 'Surat berhasil ditolak.');
    }

    //surat terverivikasi rt
        public function terverivikasirt()
    {
        $user = Auth::user();

        // Ambil surat yang terverifikasi berdasarkan role RT
        if ($user->role_id == 3) { // Role RT
            $surat = Surat::whereHas('user', function ($query) use ($user) {
                $query->where('rt_id', $user->rt_id); // Filter berdasarkan rt_id pengguna
            })->where('status', 'disetujui RT') // Hanya ambil surat yang disetujui RT
            ->get();
        } else {
            // Jika bukan RT, tidak ada data
            $surat = collect();
        }

        return view('rt.suratterverifikasi', compact('surat'));
    }

        public function ditolakrt()
    {
        $user = Auth::user();

        // Ambil surat yang ditolak berdasarkan role RT
        if ($user->role_id == 3) { // Role RT
            $surat = Surat::whereHas('user', function ($query) use ($user) {
                $query->where('rt_id', $user->rt_id); // Filter berdasarkan rt_id pengguna
            })->where('status', 'ditolak RT') // Hanya ambil surat yang ditolak
            ->get();
        } else {
            // Jika bukan RT, tidak ada data
            $surat = collect();
        }

        return view('rt.suratditolak', compact('surat'));
    }
    public function index2()
    {
        $user = Auth::user();
    
        // Cek apakah user adalah RW
        if ($user->role_id == 2) {
            // Ambil semua surat yang statusnya 'disetujui RT' dan terkait dengan RW tertentu
            $surat = Surat::where('status', 'disetujui RT') // Hanya ambil surat dengan status ini
                ->whereHas('user.rt', function ($query) use ($user) {
                    $query->where('rw_id', $user->rt->rw_id); // Filter berdasarkan rw_id
                })
                ->get(); // Ambil semua surat terkait
                
        } else {
            $surat = collect(); // Jika bukan RW, tidak ada surat yang ditampilkan
        }
    
        return view('rw.suratmasuk', compact('surat'));
    }
    
    // Mengubah status surat menjadi "disetujui RW"
    public function terima2($id)
    {
        // Cari surat berdasarkan ID
        $surat = Surat::findOrFail($id);

        // Periksa jika status surat adalah 'disetujui RT'
        if ($surat->status === 'disetujui RT') {
            // Ubah status surat menjadi 'disetujui RW'
            $surat->update(['status' => 'disetujui RW']);
        }

        // Redirect ke halaman surat masuk RW dengan pesan sukses
        return redirect()->route('surat.masuk.rw.index2')->with('success', 'Surat berhasil diterima dan disetujui RW.');
    }

    public function tolak2($id)
    {
        // Cari surat berdasarkan ID
        $surat = Surat::findOrFail($id);

        // Periksa jika status surat belum ditolak
        if ($surat->status === 'disetujui RT') {
            // Ubah status surat menjadi 'ditolak RW'
            $surat->update(['status' => 'ditolak RW']);
        }

        // Redirect ke halaman surat masuk RW dengan pesan sukses
        return redirect()->route('surat.masuk.rw.index2')->with('success', 'Surat berhasil ditolak oleh RW.');
    }

    //surat terverivikasi rw
    public function terverifikasi()
    {
        $user = Auth::user();
    
        // Cek jika pengguna adalah RW
        if ($user->role_id == 2) {
            $surat = Surat::whereHas('user', function ($query) use ($user) {
                $query->whereHas('rt', function ($query) use ($user) {
                    $query->where('rw_id', $user->rt->rw_id); // Hanya surat dengan rw_id yang sesuai
                });
            })
            ->where('status', 'disetujui RW') // Hanya surat dengan status "disetujui RW"
            ->get();
        } else {
            $surat = collect(); // Jika bukan RW, tidak ada data
        }
    
        return view('rw.suratterverifikasi', compact('surat'));
    }

    // ditolak rw
    public function ditolak()
    {
        $user = Auth::user();
    
        // Cek jika pengguna adalah RW
        if ($user->role_id == 2) {
            $surat = Surat::whereHas('user', function ($query) use ($user) {
                $query->whereHas('rt', function ($query) use ($user) {
                    $query->where('rw_id', $user->rt->rw_id); // Hanya surat dengan rw_id yang sesuai
                });
            })
            ->where('status', 'ditolak RW') // Hanya surat dengan status "ditolak"
            ->get();
        } else {
            $surat = collect(); // Jika bukan RW, tidak ada data
        }
    
        return view('rw.suratditolak', compact('surat'));
    }

    public function index3()
    {
        $user = Auth::user();

        // Ambil semua surat dengan status 'disetujui RW'
        $surat = Surat::where('status', 'disetujui RW')->get();

        return view('admin.suratmasuk', compact('surat'));
    }

    public function terima3($id)
    {
        // Cari surat berdasarkan ID
        $surat = Surat::findOrFail($id);
    
        // Redirect ke halaman surat masuk admin dengan pesan sukses dan membuka modal upload dokumen
        return redirect()->route('surat.masuk.admin.index3')->with([
            'success' => 'Surat berhasil diterima.',
            'openModal' => $surat->id // Menyimpan ID surat untuk membuka modal
        ]);
    }
    
    public function tolak3(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'reason' => 'required|string|max:255',
        ]);
    
        // Cari surat berdasarkan ID
        $surat = Surat::findOrFail($id);
    
        // Lakukan validasi status dan operasi seperti sebelumnya
        if ($surat->status === 'disetujui RW') {
            $surat->update([
                'status' => 'ditolak kelurahan',
                'alasan_penolakan' => $request->reason,
            ]);
    
            return redirect()->route('surat.masuk.admin.index3')->with('success', 'Surat berhasil ditolak oleh admin.');
        }
    
        return redirect()->route('surat.masuk.admin.index3')->with('error', 'Surat tidak dapat ditolak karena statusnya tidak sesuai.');
    }
    // upload dokumen
    public function uploadDokumen(Request $request, $id)
    {
        // Validasi file
        $request->validate([
            'dokumen' => 'required|file|mimes:pdf,docx|max:2048',
        ]);
    
        // Cari surat berdasarkan ID
        $surat = Surat::findOrFail($id);
    
        // Simpan file
        $file = $request->file('dokumen');
        $path = $file->store('uploads/surat', 'public'); // Path penyimpanan di /storage/app/public/uploads/surat
    
        // Simpan informasi dokumen ke database
        DokumenSurat::create([
            'surat_id' => $surat->id,
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $path,
            'uploaded_by' => Auth::id(),
        ]);
    
        // Ubah status surat
        $surat->update(['status' => 'disetujui kelurahan']);
          // Tambahkan notifikasi
          session()->flash('success', 'Dokumen berhasil diunggah dan surat disetujui.');
        // Redirect dengan pesan sukses
        return redirect()->route('surat.masuk.admin.index3')->with('success', 'Dokumen berhasil diunggah dan surat disetujui.');
    }

}

