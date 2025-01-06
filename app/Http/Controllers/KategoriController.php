<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $title = "Data Kategori";
        $kategoris = Kategori::withCount('penduduks')->get(); // Mendapatkan kategori dan jumlah penduduk
        
        $chartData = [
            'labels' => $kategoris->pluck('kategori_penduduk'), // Nama kategori
            'data' => $kategoris->pluck('penduduks_count'), // Jumlah penduduk per kategori
        ];

        return view('pages.DataKategori', 
        compact('title', 'kategoris', 'chartData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Input Data kategori";
        // $pekerjaans = Pekerjaan::all(); // Ambil seluruh pekerjaan jika diperlukan di form
        return view('pages.InputKategori', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Pesan kesalahan validasi
        $messages = [
            'required' => 'Kolom :attribute harus lengkap', 
        ];

        // Validasi input
        $validasi = $request->validate([
            'kategori_penduduk' => 'required',
        ], $messages);

        try {
            // Menyimpan data pekerjaan baru
            Kategori::create($validasi);
            return redirect()->route('kategori.index')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            // Menangani kesalahan
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Tidak ada implementasi untuk menampilkan pekerjaan berdasarkan ID
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Menampilkan form edit data pekerjaan berdasarkan ID
        $title = "Edit Data Kategori";
        $kategori = Kategori::findOrFail($id); // Mengambil pekerjaan berdasarkan ID
        return view('pages.InputKategori', compact('title', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Pesan kesalahan validasi
        $messages = [
            'required' => 'Kolom :attribute harus lengkap.',
        ];

        // Validasi input
        $validasi = $request->validate([
            'kategori_penduduk' => 'required|string|max:255',
        ], $messages);

        try {
            // Cari pekerjaan berdasarkan ID
            $kategori = Kategori::findOrFail($id);
            $kategori->update($validasi);

            return redirect()->route('kategori.index')->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            // Menangani kesalahan
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $kategori = Kategori::findOrFail($id);
            $kategori->delete();

            return redirect()->route('kategori.index')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            // Menangani kesalahan
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
