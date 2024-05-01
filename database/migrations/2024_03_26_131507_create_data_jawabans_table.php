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
        Schema::create('data_jawabans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kelompok_id');
            $table->foreign('kelompok_id')->references('id')->on('users');
            $table->string('soal_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_jawabans');
    }
};
