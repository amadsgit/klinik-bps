<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'nama' => 'admin',
                'deskripsi' => 'Administrator sistem',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'bidan',
                'deskripsi' => 'Tenaga kesehatan bidan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'staff',
                'deskripsi' => 'Staff klinik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Dokter',
                'deskripsi' => 'Tenaga Kesehatan Dokter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
