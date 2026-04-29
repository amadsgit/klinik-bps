<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kunjungan_bayi', function (Blueprint $table) {
            $table->id();

            $table->foreignId('kunjungan_id')
                ->constrained('kunjungan')
                ->cascadeOnDelete();

            $table->foreignId('bayi_id')
                ->constrained('bayi')
                ->cascadeOnDelete();

            $table->unique(['kunjungan_id', 'bayi_id']);
            $table->float('berat_badan');
            $table->float('tinggi_badan')->nullable();
            $table->float('lingkar_kepala')->nullable();
            $table->string('status_gizi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kunjungan_bayi');
    }
};
