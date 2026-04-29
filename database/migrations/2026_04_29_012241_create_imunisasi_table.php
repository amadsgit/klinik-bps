<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('imunisasi', function (Blueprint $table) {
            $table->id();

            $table->foreignId('kunjungan_id')
                ->constrained('kunjungan')
                ->cascadeOnDelete();

            $table->foreignId('bayi_id')
                ->constrained('bayi')
                ->cascadeOnDelete();

            $table->unique(['kunjungan_id', 'jenis_imunisasi']);
            $table->string('jenis_imunisasi');
            $table->dateTime('tanggal');

            $table->string('lokasi_suntik')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->index('kunjungan_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('imunisasi');
    }
};
