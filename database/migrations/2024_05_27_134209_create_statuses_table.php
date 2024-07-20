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
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kelompok_id');
            $table->string('namaKelompok');
            $table->string('asalSekolah');
            $table->timestamp('labirin_1')->nullable(true);
            $table->timestamp('labirin_2')->nullable(true);
            $table->timestamp('labirin_3')->nullable(true);
            $table->timestamp('is_completed')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statuses');
    }
};
