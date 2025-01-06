<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Pekerjaan;
use App\Models\Bantuan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PendataanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data penduduk
        $data = Penduduk::with(['pekerjaan', 'bantuan', 'kategori'])->get();
        return Inertia::render('Dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Input Data Penduduk';

        // Mengambil data relasi untuk opsi dropdown
        $pekerjaans = Pekerjaan::all();
        $bantuans = Bantuan::all();
        $kategoris = Kategori::all();

        return Inertia::render('InputDataPenduduk', [
            'title' => $title,
            'pekerjaans' => $pekerjaans,
            'bantuans' => $bantuans,
            'kategoris' => $kategoris,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Kolom : Atribut harus lengkap',
            'numeric' => 'Kolom : Atribut harus angka',
            'file' => 'Perhatikan format dan ukuran file', 
        ];

        // Validasi input
        $validasi = $request->validate([
            'nama_kepala_keluarga' => 'required|string|max:255',
            'nik' => 'required|digits:16|unique:penduduks,nik',
            'no_kk' => 'required|digits:16|unique:penduduks,no_kk',
            'tgl_lahir' => 'required|date',
            'pekerjaan_id' => 'required|exists:pekerjaans,id',
            'jumlah_anggota_keluarga' => 'required|integer|min:1',
            'alamat' => 'required|string|max:500',
            'bantuan_id' => 'nullable|exists:bantuans,id',
            'foto_rumah' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'foto_kk' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'kategori_id' => 'required|exists:kategoris,id',
        ], $messages);

        try{
            if ($request->hasFile('foto_rumah')) {
                $fileName = time() . $request->file('foto_rumah')->getClientOriginalName();
                $path = $request->file('foto_rumah')->storeAs('uploads/rumah', $fileName);
                $validasi['foto_rumah'] = $path;
            }
            if ($request->hasFile('foto_kk')) {
                $fileName = time() . $request->file('foto_kk')->getClientOriginalName();
                $path = $request->file('foto_kk')->storeAs('uploads/kk', $fileName);
                $validasi['foto_kk'] = $path;
            }
            
            Penduduk::create($validasi);
            return redirect()->route('pendataan.index')->with('success', 'Data berhasil disimpan!');
        }catch(\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Penduduk $penduduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penduduk $penduduk)
    {
        $pekerjaans = Pekerjaan::all();
        $bantuans = Bantuan::all();
        $kategoris = Kategori::all();

        return Inertia::render('EditPenduduk', [
            'penduduk' => $penduduk,
            'pekerjaan' => $pekerjaans,
            'bantuan' => $bantuans,
            'kategori' => $kategoris,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => 'Kolom : Atribut harus lengkap',
            'numeric' => 'Kolom : Atribut harus angka',
            'file' => 'Perhatikan format dan ukuran file', 
        ];

        // Validasi input
        $validasi = $request->validate([
            'nama_kepala_keluarga' => 'required|string|max:255',
            'nik' => 'required|digits:16|unique:penduduks,nik',
            'no_kk' => 'required|digits:16|unique:penduduks,no_kk',
            'tgl_lahir' => 'required|date',
            'pekerjaan_id' => 'required|exists:pekerjaans,id',
            'jumlah_anggota_keluarga' => 'required|integer|min:1',
            'alamat' => 'required|string|max:500',
            'bantuan_id' => 'nullable|exists:bantuans,id',
            'foto_rumah' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'foto_kk' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'kategori_id' => 'required|exists:kategoris,id',
        ], $messages);

        try{
            if ($request->hasFile('foto_rumah')) {
                $fileName = time() . $request->file('foto_rumah')->getClientOriginalName();
                $path = $request->file('foto_rumah')->storeAs('uploads/rumah', $fileName);
                $validasi['foto_rumah'] = $path;
            }
            if ($request->hasFile('foto_kk')) {
                $fileName = time() . $request->file('foto_kk')->getClientOriginalName();
                $path = $request->file('foto_kk')->storeAs('uploads/kk', $fileName);
                $validasi['foto_kk'] = $path;
            }
            $penduduks = Penduduk::findOrFail($id);
            $penduduks->update($validasi);
            return redirect()->route('pendataan.index')->with('success', 'Data berhasil disimpan!');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penduduk $penduduk)
    {
        $penduduk->delete();
        return redirect()->route('penduduk.index')->with('success', 'Data berhasil dihapus');
    }
}