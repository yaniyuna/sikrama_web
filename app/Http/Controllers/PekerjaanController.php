<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Menampilkan data pekerjaan
    $title = "Data Pekerjaan";

    // Gunakan query builder untuk paginasi
    $pekerjaans = Pekerjaan::query();  // Membuat query builder

    if (isset($_GET['s']) && $_GET['s'] != '') {
        $s = $_GET['s'];
        $pekerjaans = $pekerjaans->where('jenis_pekerjaan', 'like', "%$s%");
    }
    // Gunakan paginate sebelum query dieksekusi
    $pekerjaans = $pekerjaans->paginate(5);  // Paginasi diterapkan di sini

    // Mengambil seluruh koleksi pekerjaan
    return view('pages.DataPekerjaan', compact('title', 'pekerjaans'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form input pekerjaan baru
        $title = "Input Data Pekerjaan";
        // $pekerjaans = Pekerjaan::all(); // Ambil seluruh pekerjaan jika diperlukan di form
        return view('pages.InputPekerjaan', compact('title'));
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
            'jenis_pekerjaan' => 'required',
        ], $messages);

        try {
            // Menyimpan data pekerjaan baru
            Pekerjaan::create($validasi);
            return redirect()->route('pekerjaan.index')->with('success', 'Data berhasil disimpan!');
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
        $pekerjaan = Pekerjaan::findOrFail($id); // Mengambil pekerjaan berdasarkan ID
        return view('pages.InputPekerjaan', compact('title', 'pekerjaan'));
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
            'jenis_pekerjaan' => 'required|string|max:255',
        ], $messages);

        try {
            // Cari pekerjaan berdasarkan ID
            $pekerjaan = Pekerjaan::findOrFail($id);
            $pekerjaan->update($validasi);

            return redirect()->route('pekerjaan.index')->with('success', 'Data berhasil diperbarui!');
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
            // Cari pekerjaan berdasarkan ID dan hapus
            $pekerjaan = Pekerjaan::findOrFail($id);
            $pekerjaan->delete();

            return redirect()->route('pekerjaan.index')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            // Menangani kesalahan
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
