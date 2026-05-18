<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tindakan;

class TindakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [

            [
                'nama_tindakan' => 'Konsultasi Bidan',
                'tarif' => 25000,
                'keterangan' => 'Konsultasi kesehatan ibu dan anak',
            ],

            [
                'nama_tindakan' => 'Pemeriksaan Kehamilan (ANC)',
                'tarif' => 50000,
                'keterangan' => 'Kontrol kehamilan rutin',
            ],

            [
                'nama_tindakan' => 'USG Kehamilan',
                'tarif' => 150000,
                'keterangan' => 'Pemeriksaan USG kandungan',
            ],

            [
                'nama_tindakan' => 'Suntik KB 1 Bulan',
                'tarif' => 35000,
                'keterangan' => 'Pelayanan KB suntik 1 bulan',
            ],

            [
                'nama_tindakan' => 'Suntik KB 3 Bulan',
                'tarif' => 45000,
                'keterangan' => 'Pelayanan KB suntik 3 bulan',
            ],

            [
                'nama_tindakan' => 'Pemasangan KB Implan',
                'tarif' => 350000,
                'keterangan' => 'Pemasangan alat kontrasepsi implan',
            ],

            [
                'nama_tindakan' => 'Lepas KB Implan',
                'tarif' => 250000,
                'keterangan' => 'Pelepasan alat kontrasepsi implan',
            ],

            [
                'nama_tindakan' => 'Pemasangan IUD',
                'tarif' => 300000,
                'keterangan' => 'Pemasangan alat kontrasepsi IUD',
            ],

            [
                'nama_tindakan' => 'Lepas IUD',
                'tarif' => 200000,
                'keterangan' => 'Pelepasan alat kontrasepsi IUD',
            ],

            [
                'nama_tindakan' => 'Tes Kehamilan',
                'tarif' => 25000,
                'keterangan' => 'Pemeriksaan test pack kehamilan',
            ],

            [
                'nama_tindakan' => 'Pemeriksaan HB',
                'tarif' => 30000,
                'keterangan' => 'Pemeriksaan kadar hemoglobin',
            ],

            [
                'nama_tindakan' => 'Cek Gula Darah',
                'tarif' => 35000,
                'keterangan' => 'Pemeriksaan gula darah sewaktu',
            ],

            [
                'nama_tindakan' => 'Cek Asam Urat',
                'tarif' => 35000,
                'keterangan' => 'Pemeriksaan kadar asam urat',
            ],

            [
                'nama_tindakan' => 'Cek Kolesterol',
                'tarif' => 40000,
                'keterangan' => 'Pemeriksaan kadar kolesterol',
            ],

            [
                'nama_tindakan' => 'Nebulizer',
                'tarif' => 50000,
                'keterangan' => 'Terapi uap pernapasan',
            ],

            [
                'nama_tindakan' => 'Infus',
                'tarif' => 75000,
                'keterangan' => 'Pemasangan cairan infus',
            ],

            [
                'nama_tindakan' => 'Injeksi / Suntik',
                'tarif' => 25000,
                'keterangan' => 'Pemberian obat injeksi',
            ],

            [
                'nama_tindakan' => 'Perawatan Luka Ringan',
                'tarif' => 50000,
                'keterangan' => 'Pembersihan dan perawatan luka kecil',
            ],

            [
                'nama_tindakan' => 'Jahit Luka < 5 Jahitan',
                'tarif' => 150000,
                'keterangan' => 'Penjahitan luka ringan',
            ],

            [
                'nama_tindakan' => 'Lepas Jahitan',
                'tarif' => 50000,
                'keterangan' => 'Pelepasan benang jahitan',
            ],

            [
                'nama_tindakan' => 'Tindik Bayi',
                'tarif' => 80000,
                'keterangan' => 'Tindik telinga bayi',
            ],

            [
                'nama_tindakan' => 'Pijat Laktasi',
                'tarif' => 100000,
                'keterangan' => 'Terapi pijat ASI/laktasi',
            ],

            [
                'nama_tindakan' => 'Home Care Bidan',
                'tarif' => 150000,
                'keterangan' => 'Kunjungan bidan ke rumah pasien',
            ],

            [
                'nama_tindakan' => 'Persalinan Normal',
                'tarif' => 2500000,
                'keterangan' => 'Tindakan persalinan normal',
            ],

            [
                'nama_tindakan' => 'Kontrol Nifas',
                'tarif' => 50000,
                'keterangan' => 'Pemeriksaan ibu setelah melahirkan',
            ],

            [
                'nama_tindakan' => 'Perawatan Bayi Baru Lahir',
                'tarif' => 75000,
                'keterangan' => 'Pemeriksaan dan perawatan neonatal',
            ],

            [
                'nama_tindakan' => 'Imunisasi Bayi',
                'tarif' => 40000,
                'keterangan' => 'Pelayanan imunisasi bayi',
            ],

            [
                'nama_tindakan' => 'Perawatan Luka Sedang',
                'tarif' => 75000,
                'keterangan' => 'Perawatan luka dan dressing',
            ],

            [
                'nama_tindakan' => 'Pemasangan Kateter',
                'tarif' => 100000,
                'keterangan' => 'Pemasangan kateter urin',
            ],

        ];

        foreach ($data as $item) {
            Tindakan::create($item);
        }
    }
}