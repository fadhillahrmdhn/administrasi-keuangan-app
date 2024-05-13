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
        Schema::create('spps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('spp_id');
            $table->string('tahun_ajaran');
            $table->string('kelompok');
            $table->string('Juli');
            $table->string('Agustus');
            $table->string('September');
            $table->string('Oktober');
            $table->string('November');
            $table->string('Desember');
            $table->string('Januari');
            $table->string('Februari');
            $table->string('Maret');
            $table->string('April');
            $table->string('Mei');
            $table->string('Juni');
            $table->string('besar_spp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spps');
    }
};