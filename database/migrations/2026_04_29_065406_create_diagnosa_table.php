<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('diagnosa', function (Blueprint $table) {
            $table->id();

            $table->string('kode_icd', 10)->unique(); // contoh: O80, Z34.0
            $table->string('nama_diagnosa');
            $table->text('deskripsi')->nullable();

            $table->timestamps();

            $table->index('kode_icd');
            $table->index('nama_diagnosa');

            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('diagnosa');
    }
};
