<?php

namespace App\Http\Controllers;

use App\Models\Bantuan;
use App\Models\Kategori;
use App\Models\Pekerjaan;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Data Penduduk";
        // Mulai dengan query builder, tanpa memanggil `get()`
        $penduduks = Penduduk::with(['kategori', 'bantuan', 'pekerjaan']);
        // Filter berdasarkan pencarian (jika ada)
        if(isset($_GET['s']) && $_GET['s']!=''){
            $s=$_GET['s'];
            $penduduks=$penduduks->where('nama_kepala_keluarga', 'like', "%$s%");
        }
        if(isset($_GET['kategori_id']) && $_GET['kategori_id']!=''){
            $penduduks=$penduduks->where('kategori_id', $_GET['kategori_id']);
        }
        // Gunakan paginate sebelum query dieksekusi
        $penduduks = $penduduks->paginate(5);
        $kategoris = Kategori::all();
        $totalPenduduk = Penduduk::sum('jumlah_anggota_keluarga');
        $jumlahKeluarga = Penduduk::count();

    
        // Kembalikan view dengan data yang sudah diproses
        return view('pages.dashboard', 
        compact('title', 'penduduks', 'kategoris','totalPenduduk', 'jumlahKeluarga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Input Data Penduduk";
        $bantuans=Bantuan::all();
        $kategoris=Kategori::all();
        $pekerjaans=Pekerjaan::all();
        return view('pages.InputData', compact('title', 'bantuans', 'kategoris', 'pekerjaans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $messages = [
            'required' => 'Kolom : Atribut harus lengkap',
            'numeric' => 'Kolom : Atribut harus angka',
            'file' => 'Perhatikan format dan ukuran file', 
        ];

        $validasi=$request->validate([
            'nama_kepala_keluarga'=> 'required',
            'nik' => 'required|numeric',
            'no_kk' => 'required|numeric',
            'tgl_lahir' => 'required',
            'pekerjaan_id'=> 'required',
            'jumlah_anggota_keluarga' => 'required|numeric',
            'alamat' => 'required',
            'bantuan_id' => 'required',
            'foto_rumah'=>'mimes:png,jpg|max:1024',
            'foto_kk'=>'mimes:png,jpg|max:1024',
            'kategori_id' => 'required'
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
            return redirect()->route('penduduk.index')->with('success', 'Data berhasil disimpan!');
        
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $title="Edit Data Penduduk";
        $bantuans=Bantuan::all();
        $kategoris=Kategori::all();
        $pekerjaans=Pekerjaan::all();
        $penduduks=Penduduk::where('penduduk_id', $id)->first();

        if($penduduks != NULL){
            $title="Edit Data Penduduk".$penduduks->penduduk_id;
            return view('pages.InputData', compact('title', 'bantuans','kategoris','pekerjaans', 'penduduks'));
        }
        else{
            return view('pages.InputData', compact('title', 'bantuans','kategoris','pekerjaans'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $messages = [
            'required' => 'Kolom : Atribut harus lengkap',
            'numeric' => 'Kolom : Atribut harus angka',
            'file' => 'Perhatikan format dan ukuran file', 
        ];

        $validasi=$request->validate([
            'nama_kepala_keluarga'=> 'required',
            'nik' => 'required|numeric',
            'no_kk' => 'required|numeric',
            'tgl_lahir' => 'required',
            'pekerjaan_id'=> 'required',
            'jumlah_anggota_keluarga' => 'required|numeric',
            'alamat' => 'required',
            'bantuan_id' => 'required',
            'foto_rumah'=>'mimes:png,jpg|max:1024',
            'foto_kk'=>'mimes:png,jpg|max:1024',
            'kategori_id' => 'required'
        ], $messages);
        try{
            if ($request->hasFile(key: 'foto_rumah')) {
                $fileName = time() . $request->file('foto_rumah')->getClientOriginalName();
                $path = $request->file('foto_rumah')->storeAs('uploads/rumah', $fileName);
                $validasi['foto_rumah'] = $path;
            }
            if ($request->hasFile('foto_kk')) {
                $fileName = time() . $request->file('foto_kk')->getClientOriginalName();
                $path = $request->file('foto_kk')->storeAs('uploads/kk', $fileName);
                $validasi['foto_kk'] = $path;
            }

            $penduduk = Penduduk::findOrFail($id);
            $penduduk->update($validasi);
            return redirect()->route('penduduk.index')->with('success', 'Data berhasil disimpan!');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Cari penduduk berdasarkan ID
            $penduduk = Penduduk::findOrFail($id);
            $penduduk->delete();

            return redirect()->route('penduduk.index')->with('success', 'Data berhasil dihapus!');
            
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function bantuan($id){
        $bantuans=Bantuan::with('penduduks')->find($id);
        if (!$bantuans) {
            return redirect()->back()->with('error', 'Komik tidak ditemukan.');
        }

        $title='Bantuan'.$bantuans->jenis_bantuan;
        $penduduks=$bantuans->penduduk;

        return view('pages.dashboard', compact('title', 'penduduks', 'bantuans'));
    }

    public function kategori($id){
        $kategoris=Kategori::with('penduduks')->find($id);
        if (!$kategoris) {
            return redirect()->back()->with('error', 'Komik tidak ditemukan.');
        }

        $title='Kategori' . $kategoris->kategori_penduduk;
        $penduduks=$kategoris->penduduk;
        
        return view('pages.dashboard', compact('title', 'penduduks', 'kategoris'));
    }

    public function pekerjaan($id){
        $pekerjaans=Pekerjaan::with('penduduks')->find($id);
        if (!$pekerjaans) {
            return redirect()->back()->with('error', 'data tidak ditemukan.');
        }

        $title='Pekerjaan'.$pekerjaans->jenis_pekerjaan;
        $penduduks=$pekerjaans->penduduks;
        
        return view('pages.dashboard', compact('title', 'penduduks', 'pekerjaans'));
    }

}
