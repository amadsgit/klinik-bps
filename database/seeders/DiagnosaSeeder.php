<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Diagnosa;

class DiagnosaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            // =========================
            // KEHAMILAN NORMAL & ANTENATAL
            // =========================
            [
                'kode_icd' => 'Z34.9',
                'nama_diagnosa' => 'Pengawasan kehamilan normal',
                'deskripsi' => 'Kontrol kehamilan tanpa komplikasi'
            ],
            [
                'kode_icd' => 'Z34.0',
                'nama_diagnosa' => 'Pengawasan kehamilan pertama',
                'deskripsi' => 'Antenatal care kehamilan pertama'
            ],
            [
                'kode_icd' => 'O09.9',
                'nama_diagnosa' => 'Kehamilan risiko tinggi',
                'deskripsi' => 'Kehamilan dengan faktor risiko'
            ],

            // =========================
            // KOMPLIKASI KEHAMILAN
            // =========================
            [
                'kode_icd' => 'O21.9',
                'nama_diagnosa' => 'Mual dan muntah dalam kehamilan',
                'deskripsi' => 'Hyperemesis gravidarum ringan'
            ],
            [
                'kode_icd' => 'O26.9',
                'nama_diagnosa' => 'Komplikasi kehamilan tidak spesifik',
                'deskripsi' => 'Keluhan umum pada kehamilan'
            ],
            [
                'kode_icd' => 'O36.4',
                'nama_diagnosa' => 'Gangguan pertumbuhan janin',
                'deskripsi' => 'Fetal growth restriction'
            ],

            // =========================
            // PERSALINAN
            // =========================
            [
                'kode_icd' => 'O80.9',
                'nama_diagnosa' => 'Persalinan normal',
                'deskripsi' => 'Partus spontan tanpa komplikasi'
            ],
            [
                'kode_icd' => 'O83.9',
                'nama_diagnosa' => 'Persalinan dengan bantuan',
                'deskripsi' => 'Persalinan dengan tindakan bantuan'
            ],
            [
                'kode_icd' => 'O84.0',
                'nama_diagnosa' => 'Persalinan multipel',
                'deskripsi' => 'Kelahiran lebih dari satu bayi'
            ],

            // =========================
            // NIFAS (POSTPARTUM)
            // =========================
            [
                'kode_icd' => 'O90.9',
                'nama_diagnosa' => 'Masa nifas normal',
                'deskripsi' => 'Perawatan postpartum normal'
            ],
            [
                'kode_icd' => 'O92.5',
                'nama_diagnosa' => 'Gangguan laktasi',
                'deskripsi' => 'Kesulitan menyusui'
            ],

            // =========================
            // NEONATAL / BAYI BARU LAHIR
            // =========================
            [
                'kode_icd' => 'P07.3',
                'nama_diagnosa' => 'BBLR (Berat Badan Lahir Rendah)',
                'deskripsi' => 'Bayi dengan berat lahir rendah'
            ],
            [
                'kode_icd' => 'P21.9',
                'nama_diagnosa' => 'Asfiksia neonatorum',
                'deskripsi' => 'Gangguan napas pada bayi baru lahir'
            ],
            [
                'kode_icd' => 'P59.9',
                'nama_diagnosa' => 'Ikterus neonatorum',
                'deskripsi' => 'Bayi kuning fisiologis/patologis'
            ],

            // =========================
            // KB / KELUARGA BERENCANA
            // =========================
            [
                'kode_icd' => 'Z30.2',
                'nama_diagnosa' => 'Konseling KB',
                'deskripsi' => 'Edukasi dan konsultasi kontrasepsi'
            ],
            [
                'kode_icd' => 'Z30.4',
                'nama_diagnosa' => 'Pengawasan penggunaan kontrasepsi',
                'deskripsi' => 'Monitoring alat kontrasepsi'
            ],

        ];

        foreach ($data as $item) {
            Diagnosa::create($item);
        }
    }
}