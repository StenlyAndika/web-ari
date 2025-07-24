<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\BarangSeeder;
use Database\Seeders\SupplierSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            SupplierSeeder::class,
            BarangSeeder::class,
            SupplierSeeder::class,
            BarangMasukSeeder::class,
            BarangKeluarSeeder::class,
        ]);
    }
}
