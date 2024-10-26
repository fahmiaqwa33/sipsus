<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::all();
        return view('admin.informasi', compact('informasi'));
    }

    public function create()
    {
        return view('admin.create_informasi');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $gambarPath = $request->file('gambar') ? $request->file('gambar')->store('informasi', 'public') : null;

        Informasi::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.informasi.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $informasi = Informasi::findOrFail($id);
        return view('admin.edit_informasi', compact('informasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $informasi = Informasi::findOrFail($id);

        if ($request->hasFile('gambar')) {
            if ($informasi->gambar) {
                Storage::disk('public')->delete($informasi->gambar);
            }
            $gambarPath = $request->file('gambar')->store('informasi', 'public');
        } else {
            $gambarPath = $informasi->gambar;
        }

        $informasi->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.informasi.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);
        if ($informasi->gambar) {
            Storage::disk('public')->delete($informasi->gambar);
        }
        $informasi->delete();
        return redirect()->route('admin.informasi.index')->with('success', 'Berita berhasil dihapus.');
    }
    public function show($id)
    {
        $informasi = Informasi::findOrFail($id);
        return view('admin.show_informasi', compact('informasi'));
    }

}
