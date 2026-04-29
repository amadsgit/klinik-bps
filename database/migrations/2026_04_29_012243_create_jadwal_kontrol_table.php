<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_kontrol', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pasien_id')
                ->constrained('pasien')
                ->cascadeOnDelete();

            $table->dateTime('tanggal');
            $table->enum('jenis', ['ANC', 'NIFAS', 'BAYI', 'KB', 'UMUM']);
            $table->enum('status', ['terjadwal', 'selesai', 'batal']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_kontrol');
    }
};
