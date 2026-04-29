<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bayi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persalinan_id')->constrained('persalinan')->cascadeOnDelete();
            $table->string('nama_bayi')->nullable();
            $table->string('jenis_kelamin');
            $table->float('berat_lahir');
            $table->float('panjang_lahir')->nullable();
            $table->string('kondisi_lahir')->nullable();
            $table->string('jenis_persalinan')->nullable();
            $table->boolean('inisiasi_menyusu_dini')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bayi');
    }
};
