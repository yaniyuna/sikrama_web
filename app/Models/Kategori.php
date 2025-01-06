<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $primaryKey = 'kategori_id'; // Primary key tabel
    protected $table = 'kategoris'; // Nama tabel di database
    protected $fillable = [
        'kategori_penduduk'
    ];

    /**
     * Relasi satu ke banyak dengan model Penduduk.
     * Satu kategori dapat memiliki banyak penduduk.
     */
    public function penduduks()
    {
        return $this->hasMany(Penduduk::class, 'kategori_id', 'kategori_id');
    }
}
