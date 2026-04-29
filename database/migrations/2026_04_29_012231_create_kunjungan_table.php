<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kunjungan', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pasien_id')
                ->constrained('pasien')
                ->cascadeOnDelete();

            $table->dateTime('tanggal');

            $table->enum('jenis_layanan', [
                'ANC',
                'PERSALINAN',
                'NIFAS',
                'BAYI',
                'KB',
                'UMUM',
            ]);

            $table->foreignId('tenaga_kesehatan_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
            $table->text('keluhan')->nullable();
            $table->text('catatan')->nullable();

            $table->integer('nomor_antrian')->nullable();

            $table->enum('status', ['menunggu', 'proses', 'selesai'])
                ->default('menunggu');

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();

            // Index untuk performa
            $table->index('pasien_id');
            $table->index('tanggal');
            $table->index('jenis_layanan');

            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kunjungan');
    }
};
