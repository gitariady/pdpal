<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // ubah kolom level menjadi ENUM
            $table->enum('level', ['admin', 'petugas', 'supervisor'])
                  ->default('admin')
                  ->change();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // kembalikan ke string biasa
            $table->string('level')->default('admin')->change();
        });
    }
};
