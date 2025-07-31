<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KendaraanSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk kendaraan.
     */
    public function run(): void
    {
        DB::table('kendaraan')->insert([
            [
                'nama'      => 'Mobil Operasional',
                'kegunaan'  => 'Digunakan untuk keperluan operasional lapangan',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'nama'      => 'Truk Pengangkut Limbah',
                'kegunaan'  => 'Mengangkut limbah dari pelanggan',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'nama'      => 'Motor Dinas',
                'kegunaan'  => 'Transportasi petugas untuk pelayanan',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
        ]);
    }
}
