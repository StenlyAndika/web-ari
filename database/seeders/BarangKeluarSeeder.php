<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BarangKeluarSeeder extends Seeder
{
    //php artisan db:seed --class=BarangKeluarSeeder

    public function run(): void
    {
        $data = [];

        // Generate 5 records for June 2025
        for ($i = 1; $i <= 5; $i++) {
            $data[] = [
                'id_barang' => rand(1, 20),
                'jumlah' => rand(5, 30),
                'created_at' => Carbon::create(2025, 6, $i, rand(0, 23), rand(0, 59), rand(0, 59)),
                'updated_at' => Carbon::create(2025, 6, $i, rand(0, 23), rand(0, 59), rand(0, 59)),
            ];
        }

        // Generate 15 records for July 2025
        for ($i = 1; $i <= 15; $i++) {
            $data[] = [
                'id_barang' => rand(1, 20),
                'jumlah' => rand(5, 30),
                'created_at' => Carbon::create(2025, 7, $i, rand(0, 23), rand(0, 59), rand(0, 59)),
                'updated_at' => Carbon::create(2025, 7, $i, rand(0, 23), rand(0, 59), rand(0, 59)),
            ];
        }

        DB::table('barang_keluar')->insert($data);
    }
}
