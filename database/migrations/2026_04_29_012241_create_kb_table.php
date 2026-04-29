<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kb', function (Blueprint $table) {
            $table->id();

            $table->foreignId('kunjungan_id')
                ->constrained('kunjungan')
                ->cascadeOnDelete();
            $table->string('jenis_kb');
            $table->dateTime('tanggal_pasang');

            $table->dateTime('tanggal_kontrol')->nullable();
            $table->string('efek_samping')->nullable();
            $table->enum('status', ['aktif', 'nonaktif', 'selesai']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kb');
    }
};
