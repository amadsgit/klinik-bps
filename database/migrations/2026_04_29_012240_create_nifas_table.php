<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nifas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kunjungan_id')->constrained('kunjungan')->cascadeOnDelete();
            $table->foreignId('persalinan_id')->constrained('persalinan')->cascadeOnDelete();
            $table->integer('hari_ke');
            $table->string('tekanan_darah')->nullable();
            $table->float('suhu')->nullable();
            $table->string('lochea')->nullable();
            $table->string('kondisi_payudara')->nullable();
            $table->text('konseling')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nifas');
    }
};
