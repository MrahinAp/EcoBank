<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tabungan_sampah', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis_sampah');
            $table->float('berat_sampah');
            $table->integer('point');
           $table->binary('gambar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tabungan_sampah');
    }
};
