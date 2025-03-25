<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuliahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuliah', function (Blueprint $table) {
            $table->id();
            $table->integer('nomor')->nullable();
            $table->year('tahun')->nullable();
            $table->string('sem')->nullable();
            $table->string('semester')->nullable();
            $table->string('nama_kelas')->nullable();
            $table->string('nama_matakuliah')->nullable();
            $table->string('hari_kuliah')->nullable();
            $table->time('jam_kuliah')->nullable();
            $table->string('ruang_kuliah')->nullable();
            $table->string('dosen_1')->nullable();
            $table->string('dosen_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kuliah');
    }
}
