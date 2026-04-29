<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anc_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kunjungan_id')->constrained('kunjungan')->cascadeOnDelete();
            $table->unique('kunjungan_id');
            $table->foreignId('kehamilan_id')->constrained('kehamilan')->cascadeOnDelete();
            $table->integer('usia_kehamilan');
            $table->float('berat_badan');
            $table->string('tekanan_darah');
            $table->float('tinggi_fundus')->nullable();
            $table->integer('djj')->nullable();
            $table->string('posisi_janin')->nullable();
            $table->string('edema')->nullable();
            $table->integer('tablet_fe')->nullable();
            $table->string('imunisasi_tt')->nullable();
            $table->text('catatan')->nullable();
            $table->float('hb')->nullable();
            $table->string('protein_urin')->nullable();
            $table->float('gula_darah')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anc_detail');
    }
};
