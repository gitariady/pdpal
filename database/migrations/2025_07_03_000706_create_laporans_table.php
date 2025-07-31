<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->integer('pdpal_id')->nullable();
            $table->string('jenis_laporan');
            $table->string('status_pelaporan');
            $table->string('nomor_laporan')->unique();
            $table->string('nama',50);
            $table->string('no_hp',15);
            $table->string('alamat');
            $table->string('ktp',100)->nullable();
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
