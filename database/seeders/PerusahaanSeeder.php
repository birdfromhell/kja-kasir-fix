<?php

namespace Database\Seeders;

use App\Models\Perusahaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $perusahaanData = [
            [
                'kode_perusahaan' => 'D-0001',
                'nama_perusahaan' => 'Makmur',
                'jenis' => 'Developer',
                'alamat_kantor' => '-', // Use bcrypt() to hash the password
                'alamat_gudang' => '-',
                'nama_pimpinan' => 'Pais',
                'no_telepon' => '0',
                'plafon_debit' => '0',
                'plafon_kredit' => '0'
            ],
            [
                'kode_perusahaan' => 'D-0002',
                'nama_perusahaan' => 'Toko Komputer Cerdas',
                'jenis' => 'Developer',
                'alamat_kantor' => 'Jl. Saluyu Indah Raya Bandung', // Use bcrypt() to hash the password
                'alamat_gudang' => 'Jl. Saluyu Indah Raya Bandung',
                'nama_pimpinan' => 'Ibu Quin',
                'no_telepon' => '0812 2189 1234',
                'plafon_debit' => '0',
                'plafon_kredit' => '0'
            ],
        ];

        foreach ($perusahaanData as $userData) {
            Perusahaan::create($userData);
        }


        $supplierData = [
            [
                'kode_perusahaan' => 'S-0001',
                'nama_perusahaan' => 'Distributor Komputer',
                'jenis' => 'Supplier',
                'alamat_kantor' => 'Jakarta', // Use bcrypt() to hash the password
                'alamat_gudang' => 'Jakarta',
                'nama_pimpinan' => 'H Udin',
                'no_telepon' => '0877 6401 1234',
                'plafon_debit' => '0',
                'plafon_kredit' => '0'
            ],
            // [
            //     'kode_perusahaan' => 'S-0002',
            //     'nama_perusahaan' => 'Indomakan ',
            //     'jenis' => 'Supplier',
            //     'alamat_kantor' => 'Jakarta', // Use bcrypt() to hash the password
            //     'alamat_gudang' => 'Jakarta',
            //     'nama_pimpinan' => 'Ibu Ana',
            //     'no_telepon' => '0877 6401 2234',
            //     'plafon_debit' => '0',
            //     'plafon_kredit' => '0'
            // ],
            // [
            //     'kode_perusahaan' => 'S-0003',
            //     'nama_perusahaan' => 'Dahaga ',
            //     'jenis' => 'Supplier',
            //     'alamat_kantor' => 'Bandung', // Use bcrypt() to hash the password
            //     'alamat_gudang' => 'Bandung',
            //     'nama_pimpinan' => 'Ibu Hj Noni',
            //     'no_telepon' => '0877 6401 2234',
            //     'plafon_debit' => '0',
            //     'plafon_kredit' => '0'
            // ],
        ];

        foreach ($supplierData as $userData) {
            Perusahaan::create($userData);
        }

        $konsumenData = [
            [
                'kode_perusahaan' => 'K-0001',
                'nama_perusahaan' => 'Toko Berani',
                'jenis' => 'Konsumen',
                'alamat_kantor' => 'Bandung', // Use bcrypt() to hash the password
                'alamat_gudang' => 'Bandung',
                'nama_pimpinan' => '-',
                'no_telepon' => '0',
                'plafon_debit' => '0',
                'plafon_kredit' => '0'
            ],
            // [
            //     'kode_perusahaan' => 'K-0002',
            //     'nama_perusahaan' => 'Toko Ultra',
            //     'jenis' => 'Konsumen',
            //     'alamat_kantor' => 'Bandung', // Use bcrypt() to hash the password
            //     'alamat_gudang' => 'Bandung',
            //     'nama_pimpinan' => '-',
            //     'no_telepon' => '0',
            //     'plafon_debit' => '0',
            //     'plafon_kredit' => '0'
            // ],
        ];

        foreach ($konsumenData as $userData) {
            Perusahaan::create($userData);
        }
    }
}
