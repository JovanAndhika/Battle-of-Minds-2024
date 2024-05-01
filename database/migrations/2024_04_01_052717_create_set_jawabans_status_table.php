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
        Schema::create('set_jawabans_status', function (Blueprint $table) {
            $table->id();
            $table->boolean('status_paket_a')->nullable();
            $table->boolean('status_paket_b')->nullable();
            $table->boolean('status_paket_c')->nullable();
            $table->boolean('status_paket_d')->nullable();
            $table->boolean('status_paket_e')->nullable();
            $table->boolean('status_paket_f')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('set_jawabans_status');
    }
};
