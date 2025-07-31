<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name'     => 'Admin User',
            'email'    => 'admin@example.com',
            'password' => Hash::make('123456'),
            'level'    => 'admin',
            'remember_token' => null,
            'email_verified_at' => null,
        ]);

        // Petugas
        User::create([
            'name'     => 'Petugas Satu',
            'email'    => 'petugas@example.com',
            'password' => Hash::make('123456'),
            'level'    => 'petugas',
            'remember_token' => null,
            'email_verified_at' => null,
        ]);

        // Supervisor
        User::create([
            'name'     => 'Supervisor Utama',
            'email'    => 'supervisor@example.com',
            'password' => Hash::make('123456'),
            'level'    => 'supervisor',
            'remember_token' => null,
            'email_verified_at' => null,
        ]);
    }
}
