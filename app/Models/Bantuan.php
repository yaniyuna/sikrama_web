<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bantuan extends Model
{
    use HasFactory;

    protected $primaryKey = 'bantuan_id'; // Laravel akan otomatis menggunakan 'id', jadi tidak perlu menyebutkan kecuali berbeda
    protected $table = 'bantuans'; // Nama tabel di database
    protected $fillable = [
        'jenis_bantuan', 
        'deskripsi'
    ];

    /**
     * Relasi satu ke banyak dengan model Penduduk.
     * Satu bantuan dapat dimiliki oleh banyak penduduk.
     */
    public function penduduks()
    {
        return $this->hasMany(Penduduk::class, 'bantuan_id', 'bantuan_id');
    }
}
