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
        Schema::create('elim_duas', function (Blueprint $table) {
            $table->id();
            $table->string('namaKelompok');
            $table->string('asalSekolah');
            $table->double('jumlahPoin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elim_duas');
    }
};
