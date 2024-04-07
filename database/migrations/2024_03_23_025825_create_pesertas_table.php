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
            $table->string('namaKelompok');
            $table->string('confirmPass');
            $table->string('buktiTransaksi');

            $table->string('kontakPerwakilan');
            $table->string('namaSatu');
            $table->string('emailSatu');
            $table->string('angkatanSatu');
            $table->string('jenisKonsumsiSatu');
            $table->string('alergiSatu');

            $table->string('namaDua');
            $table->string('angkatanDua');
            $table->string('jenisKonsumsiDua');
            $table->string('alergiDua');

            $table->string('namaTiga');
            $table->string('angkatanTiga');
            $table->string('jenisKonsumsiTiga');
            $table->string('alergiTiga');

            $table->string('kartuPelajar');
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
