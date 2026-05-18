<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\DiagnosaSeeder;
use Database\Seeders\tindakanSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            tindakanSeeder::class,
            DiagnosaSeeder::class
        ]);
    }
}
