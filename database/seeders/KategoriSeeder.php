<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create([
            'nama'     => 'Materia bangunan ',
            'slug'     => 'materia bangunan ',
            'deskripsi' => 'Kategori untuk Urukan atau bahan bangunan',
        ]);

        Kategori::create([
            'nama'     => 'Toilet',
            'slug'     => 'Toilet',
            'deskripsi' => 'Kategori untuk bahan pemasangan toilet',
        ]);

        Kategori::create([
            'nama'     => 'Septic Tank',
            'slug'     => 'Septic Tank',
            'deskripsi' => 'Kategori untuk Bahan Pemasangan septic tank',
        ]);
        Kategori::create([
                'nama'     => 'Upah Pekerja',
                'slug'     => 'Upah Pekerja',
                'deskripsi' => 'Upah Harian Pekerja atau Borongan',
        ]);
    }
}
