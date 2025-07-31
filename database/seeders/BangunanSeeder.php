<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Bangunan;

class BangunanSeeder extends Seeder
{
    public function run(): void
    {
        Bangunan::insert([
            [
                'nama_bangunan' => 'Rumah Tangga',
                'biaya'         => 100000,
            ],
            [
                'nama_bangunan' => 'Rumah Makan',
                'biaya'         => 200000,
            ],
            [
                'nama_bangunan' => 'Industri',
                'biaya'         => 400000,
            ],
            [
                'nama_bangunan' => 'Kantor Intansi Pemerintahan',
                'biaya'         => 500000,
            ],
            [
                'nama_bangunan' => 'Perusahaan/Badan Usaha Negara/Daerah',
                'biaya'         => 975000,
            ],
        ]);
    }
}
