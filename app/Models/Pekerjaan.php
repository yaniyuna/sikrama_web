<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $primaryKey = 'pekerjaan_id'; // Primary key tabel
    protected $table = 'pekerjaans'; // Nama tabel di database
    protected $fillable = [
        'jenis_pekerjaan', 
    ];

    /**
     * Relasi satu ke banyak dengan model Penduduk.
     * Satu jenis pekerjaan dapat dimiliki oleh banyak penduduk.
     */
    public function penduduks()
    {
        return $this->hasMany(Penduduk::class, 'pekerjaan_id', 'pekerjaan_id');
    }
}
