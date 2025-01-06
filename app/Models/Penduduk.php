<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi secara mass-assignment
    protected $table = 'penduduks';
    protected $primaryKey = 'penduduk_id';
    protected $fillable = [
        'nama_kepala_keluarga',
        'nik',
        'no_kk',
        'tgl_lahir',
        'pekerjaan_id',
        'jumlah_anggota_keluarga',
        'alamat',
        'bantuan_id',
        'foto_rumah',
        'foto_kk',
        'kategori_id',
    ];

    /**
     * Relasi dengan model Pekerjaan.
     * Penduduk terkait dengan satu jenis pekerjaan.
     */
    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan_id', 'pekerjaan_id');
    }

    /**
     * Relasi dengan model Bantuan.
     * Penduduk terkait dengan satu jenis bantuan.
     */
    public function bantuan()
    {
        return $this->belongsTo(Bantuan::class, 'bantuan_id', 'bantuan_id'); // Ganti 'bantuan_id' kedua jika primary key berbeda
    }

    /**
     * Relasi dengan model Kategori.
     * Penduduk terkait dengan satu kategori.
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'kategori_id');
    }
}
