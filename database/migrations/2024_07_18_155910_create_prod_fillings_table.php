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
        Schema::create('prod_fillings', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal'); // Tanggal
            $table->string('nama_produk'); // Nama Produk
            $table->string('ka_group'); // Ka Group
            $table->string('ukuran'); // Ukuran (dropdown)
            $table->string('no_lot'); // No. Lot
            $table->string('bagian'); // Bagian (dropdown)
            $table->string('foto_standar'); // Foto Standar (static image URL or path)
            $table->string('foto_real'); // Foto Real (camera capture)
            $table->string('penanggung_jawab'); // Penanggung Jawab (dropdown)
            $table->timestamp('waktu_awal'); // Waktu Awal
            $table->integer('downtime'); // Downtime (in minutes)
            $table->string('foto_awal_dt'); // Foto Awal Downtime (camera capture)
            $table->string('foto_akhir_dt'); // Foto Akhir Downtime (camera capture)
            $table->timestamp('waktu_akhir'); // Waktu Akhir
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prod_fillings');
    }
};
