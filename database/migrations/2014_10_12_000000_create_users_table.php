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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('asalSekolah');
            $table->string('namaKelompok');
            $table->string('password');
            $table->string('buktiTransaksi');

            $table->string('emailPerwakilan');
            $table->string('namaSatu');
            $table->string('kontakSatu');
            $table->string('kartuPelajarSatu');

            $table->string('namaDua');
            $table->string('kontakDua');
            $table->string('kartuPelajarDua');

            $table->string('namaTiga');
            $table->string('kontakTiga');
            $table->string('kartuPelajarTiga');

            $table->boolean('is_validated')->default(0);
            $table->boolean('is_admin')->default(0);
            $table->boolean('is_panit')->default(1);
            $table->integer('poin')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
