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
        Schema::create('harga_spps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('spp_id');
            $table->string('Juli')->nullable();
            $table->string('Agustus')->nullable();
            $table->string('September')->nullable();
            $table->string('Oktober')->nullable();
            $table->string('November')->nullable();
            $table->string('Desember')->nullable();
            $table->string('Januari')->nullable();
            $table->string('Februari')->nullable();
            $table->string('Maret')->nullable();
            $table->string('April')->nullable();
            $table->string('Mei')->nullable();
            $table->string('Juni')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harga_spps');
    }
};
