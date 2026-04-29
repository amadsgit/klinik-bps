<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('persalinan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kunjungan_id')->constrained('kunjungan')->cascadeOnDelete();
            $table->unique('kunjungan_id');
            $table->foreignId('kehamilan_id')->constrained('kehamilan')->cascadeOnDelete();
            $table->dateTime('tanggal_persalinan');
            $table->string('jenis_persalinan');
            $table->string('lama_persalinan')->nullable();
            $table->string('penolong')->nullable();
            $table->text('komplikasi')->nullable();
            $table->string('kondisi_ibu')->nullable();
            $table->string('apgar_score')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('persalinan');
    }
};
