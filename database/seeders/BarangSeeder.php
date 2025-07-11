<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BarangSeeder extends Seeder
{
    //php artisan db:seed --class=BarangSeeder

    public function run(): void
    {
        $data = [
            ['nama' => 'Pensil 2B', 'satuan' => 'batang', 'harga' => 1500, 'stok' => 100],
            ['nama' => 'Sirup ABC', 'satuan' => 'botol', 'harga' => 12000, 'stok' => 30],
            ['nama' => 'Masker Medis', 'satuan' => 'box', 'harga' => 25000, 'stok' => 50],
            ['nama' => 'Paracetamol', 'satuan' => 'butir', 'harga' => 500, 'stok' => 200],
            ['nama' => 'Mi Instan', 'satuan' => 'dus', 'harga' => 120000, 'stok' => 10],
            ['nama' => 'Tisu Gulung', 'satuan' => 'karton', 'harga' => 30000, 'stok' => 15],
            ['nama' => 'Beras Premium', 'satuan' => 'kg', 'harga' => 14000, 'stok' => 25],
            ['nama' => 'Map Plastik', 'satuan' => 'lembar', 'harga' => 2000, 'stok' => 80],
            ['nama' => 'Minyak Goreng', 'satuan' => 'liter', 'harga' => 18000, 'stok' => 40],
            ['nama' => 'Kertas HVS', 'satuan' => 'pak', 'harga' => 35000, 'stok' => 20],
            ['nama' => 'Pulpen', 'satuan' => 'pcs', 'harga' => 2500, 'stok' => 120],
            ['nama' => 'Lakban', 'satuan' => 'roll', 'harga' => 7000, 'stok' => 60],
            ['nama' => 'Kopi Sachet', 'satuan' => 'sachet', 'harga' => 1500, 'stok' => 150],
            ['nama' => 'Spidol Whiteboard', 'satuan' => 'set', 'harga' => 25000, 'stok' => 12],
            ['nama' => 'Kabel Listrik', 'satuan' => 'meter', 'harga' => 12000, 'stok' => 100],
            ['nama' => 'Masker Kain', 'satuan' => 'pcs', 'harga' => 3000, 'stok' => 50],
            ['nama' => 'Air Mineral', 'satuan' => 'liter', 'harga' => 6000, 'stok' => 100],
            ['nama' => 'Obat Sakit Kepala', 'satuan' => 'butir', 'harga' => 700, 'stok' => 90],
            ['nama' => 'Kertas Kado', 'satuan' => 'lembar', 'harga' => 4000, 'stok' => 60],
            ['nama' => 'Paku', 'satuan' => 'kg', 'harga' => 10000, 'stok' => 75],
        ];

        foreach ($data as &$item) {
            $item['created_at'] = Carbon::now();
            $item['updated_at'] = Carbon::now();
        }

        DB::table('barang')->insert($data);
    }
}
