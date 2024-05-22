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
        //
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->string('asalSekolah');
            $table->string('kontakSekolah');
            $table->string('usernameKelompok');
            $table->string('kelas');
            $table->string('jurusan');
            $table->string('kontakPerwakilan');
            $table->string('confirmPass');
            $table->string('namaKetua');
            $table->string('emailKetua');
            $table->string('kerabatSatu');
            $table->string('namaKedua');
            $table->string('kerabatDua');
            $table->string('namaKetiga');
            $table->string('kerabatTiga');
            $table->string('jenisKonsumsi');
            $table->string('alergi');
            $table->string('buktiTransaksi');
            $table->boolean('is_validated')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('pesertas');
    }
};
