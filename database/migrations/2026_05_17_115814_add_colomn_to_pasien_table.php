<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pasien', function (Blueprint $table) {

            /*
            |--------------------------------------------------------------------------
            | IDENTITAS PASIEN
            |--------------------------------------------------------------------------
            */

            $table->enum('jenis_kelamin', ['L', 'P'])
                ->nullable()
                ->after('tanggal_lahir');

            $table->string('agama')
                ->nullable()
                ->after('jenis_kelamin');

            $table->string('pendidikan')
                ->nullable()
                ->after('agama');


            /*
            |--------------------------------------------------------------------------
            | KONTAK & ALAMAT
            |--------------------------------------------------------------------------
            */

            $table->string('rt', 5)
                ->nullable()
                ->after('no_hp');

            $table->string('rw', 5)
                ->nullable()
                ->after('rt');


            /*
            |--------------------------------------------------------------------------
            | DATA KELUARGA
            |--------------------------------------------------------------------------
            */

            $table->string('pekerjaan_suami')
                ->nullable()
                ->after('nama_suami');

            $table->string('nama_ibu_kandung')
                ->nullable()
                ->after('pekerjaan_suami');

            $table->string('kontak_darurat')
                ->nullable()
                ->after('nama_ibu_kandung');


            /*
            |--------------------------------------------------------------------------
            | MEDIS DASAR
            |--------------------------------------------------------------------------
            */

            $table->text('riwayat_penyakit')
                ->nullable()
                ->after('alergi');


            /*
            |--------------------------------------------------------------------------
            | ADMINISTRASI
            |--------------------------------------------------------------------------
            */

            $table->string('no_bpjs')
                ->nullable()
                ->after('riwayat_penyakit');

            $table->enum('status_pasien', ['Aktif', 'Nonaktif'])
                ->default('Aktif')
                ->after('no_bpjs');

        });
    }

    public function down(): void
    {
        Schema::table('pasien', function (Blueprint $table) {

            $table->dropColumn([
                'jenis_kelamin',
                'agama',
                'pendidikan',
                'rt',
                'rw',
                'pekerjaan_suami',
                'nama_ibu_kandung',
                'kontak_darurat',
                'riwayat_penyakit',
                'no_bpjs',
                'status_pasien',
            ]);

        });
    }
};