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
        schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->date('tahun_pengajuan');
            $table->enum('skema_pkm', [
                'PKM-RE', 'PKM-KI', 'PKM-K', 'PKM-AI', 'PKM-PI', 'PKM-KC',
                'PKM-RSH', 'PKM-VGK', 'PKM-GFT', 'PKM-PM'
            ]);
            $table->string('pendanaan_pt')->nullable();
            $table->string('pendanaan_belmawa')->nullable();
            $table->string('pendanaan_lain')->nullable();
            $table->integer('jumlah_anggota_tim');
            $table->string('file_proposal');
            $table->enum('status_validasi', [
                'Proses Pengajuan', 'Ditolak', 'Revisi', 'Diterima', 'Belum Diajukan'
            ])->default('Belum Diajukan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('proposals');
    }
};
