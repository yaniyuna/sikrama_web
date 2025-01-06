<?php

namespace App\Http\Controllers;

use App\Models\Bantuan;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class BantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan data pekerjaan
        $title = "Data Bantuan";
        $bantuans = Bantuan::query(); // Mengambil seluruh koleksi pekerjaan
        
        if (isset($_GET['s']) && $_GET['s'] != '') {
            $s = $_GET['s'];
            $bantuans = $bantuans->where('jenis_bantuan', 'like', "%$s%");
        }
        // Gunakan paginate sebelum query dieksekusi
        $bantuans = $bantuans->paginate(5); 
        return view('pages.DataBantuan', compact('title', 'bantuans'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form input pekerjaan baru
        $title = "Input Data Bantuan";
        // $pekerjaans = Pekerjaan::all(); // Ambil seluruh pekerjaan jika diperlukan di form
        return view('pages.InputBantuan', compact('title'));
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
            'jenis_bantuan' => 'required',
            'deskripsi' => ''
        ], $messages);

        try {
            Bantuan::create($validasi);
            return redirect()->route('bantuan.index')->with('success', 'Data berhasil disimpan!');
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
        $title = "Edit Data Bantuan";
        $bantuan = Bantuan::findOrFail($id); // Mengambil pekerjaan berdasarkan ID
        return view('pages.InputBantuan', compact('title', 'bantuan'));
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
            'jenis_bantuan' => 'required|string|max:255',
            'deskripsi' => ''
        ], $messages);

        try {
            // Cari pekerjaan berdasarkan ID
            $bantuan = Bantuan::findOrFail($id);
            $bantuan->update($validasi);
            

            return redirect()->route('bantuan.index')->with('success', 'Data berhasil diperbarui!');
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
            $bantuan = Bantuan::findOrFail($id);
            $bantuan->delete();

            return redirect()->route('bantuan.index')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            // Menangani kesalahan
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
