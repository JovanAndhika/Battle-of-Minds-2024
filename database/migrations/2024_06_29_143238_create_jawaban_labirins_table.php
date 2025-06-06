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
        Schema::create('jawaban_labirins', function (Blueprint $table) {
            $table->id();
            $table->integer('labirin_1')->nullable();
            $table->integer('labirin_2')->nullable();
            $table->integer('labirin_3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban_labirins');
    }
};
