<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            ['kode_kategori' => 'K0001', 'kategori_barang' => 'Barang Elektronik'],
            // ['kode_kategori' => 'K0002', 'kategori_barang' => 'Makanan'],
        ];

        Kategori::insert($kategori);
    }
}
