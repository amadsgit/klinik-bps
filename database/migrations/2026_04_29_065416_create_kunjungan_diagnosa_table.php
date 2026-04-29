<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kunjungan_diagnosa', function (Blueprint $table) {
            $table->id();

            $table->foreignId('kunjungan_id')
                ->constrained('kunjungan')
                ->cascadeOnDelete();

            $table->foreignId('diagnosa_id')
                ->constrained('diagnosa')
                ->restrictOnDelete();

            $table->unique(['kunjungan_id', 'diagnosa_id']);
            $table->enum('tipe', ['utama', 'sekunder'])->default('utama');
            $table->text('catatan')->nullable();

            $table->timestamps();

            $table->index('kunjungan_id');
            $table->index('diagnosa_id');
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('diagnosa_kunjungan');
    }
};
