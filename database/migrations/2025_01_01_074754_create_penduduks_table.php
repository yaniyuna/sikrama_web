<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id('penduduk_id');
            $table->string('nama_kepala_keluarga');
            $table->integer('nik');
            $table->integer('no_kk');
            $table->date('tgl_lahir');
            $table->foreignId('pekerjaan_id');
            $table->integer('jumlah_anggota_keluarga');
            $table->text('alamat');
            $table->foreignId('bantuan_id');
            $table->string('foto_rumah');
            $table->string('foto_kk');
            $table->foreignId('kategori_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduks');
    }
};
