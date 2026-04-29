<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kunjungan_tindakan', function (Blueprint $table) {
            $table->id();

            $table->foreignId('kunjungan_id')
                ->constrained('kunjungan')
                ->cascadeOnDelete();

            $table->foreignId('tindakan_id')
                ->constrained('tindakan')
                ->restrictOnDelete();

            $table->unique(['kunjungan_id', 'tindakan_id']);
            $table->integer('qty')->default(1);
            $table->decimal('tarif', 12, 2); // snapshot harga saat transaksi
            $table->decimal('subtotal', 12, 2);

            $table->timestamps();

            $table->index('kunjungan_id');
            $table->index('tindakan_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tindakan_kunjungan');
    }
};
