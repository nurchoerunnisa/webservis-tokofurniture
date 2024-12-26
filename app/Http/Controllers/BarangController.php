<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();
        return view('admin.barang', compact('barang'));
    }

    public function dataBarang()
    {
        $barang = Barang::select(['gambar', 'nama', 'harga', 'stok', 'alamat', 'id'])->get();
        return response()->json($barang);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.barang-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
        ]);

        // Simpan gambar
        $path = $request->file('gambar')->store('public/img');
        $newPath = str_replace('public/', '', $path);

        // Simpan data ke tabel File
        File::create([
            'path' => $newPath,
            'type' => $request->file('gambar')->getClientMimeType(),
        ]);

        // Simpan data ke tabel Barang
        Barang::create([
            'gambar' => $newPath,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barang = Barang::findOrFail($id);
        return view('admin.barang-edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
        ]);

        // Ambil data barang
        $barang = Barang::findOrFail($id);

        // Periksa apakah ada file gambar yang diupload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($barang->gambar) {
                Storage::delete('public/' . $barang->gambar);
            }

            // Simpan gambar baru
            $path = $request->file('gambar')->store('public/img');
            $newPath = str_replace('public/', '', $path);

            // Update path gambar
            $barang->gambar = $newPath;

            // Update tabel File
            $file = File::where('path', $barang->gambar)->first();
            if ($file) {
                $file->path = $newPath;
                $file->save();
            } else {
                File::create([
                    'path' => $newPath,
                    'type' => $request->file('gambar')->getClientMimeType(),
                ]);
            }
        }

        // Update data barang
        $barang->nama = $request->nama;
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        $barang->deskripsi = $request->deskripsi;
        $barang->alamat = $request->alamat;
        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($barang->gambar) {
            Storage::delete('public/' . $barang->gambar);
        }

        // Hapus data di tabel File jika ada
        File::where('path', $barang->gambar)->delete();

        // Hapus data barang
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil dihapus');
    }
}
