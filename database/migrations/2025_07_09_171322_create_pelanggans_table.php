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
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id();
            $table->integer('pdpal_id')->unique();
            $table->integer('pdam_id')->unique();
            $table->string('nama', 50);
            $table->string('ktp', 100)->nullable();
            $table->string('bangunan');
            $table->string('luas_bangunan');
            $table->string('kecamatan', 50);
            $table->string('kelurahan', 50);
            $table->string('alamat');
            $table->date('waktu');
            $table->string('status');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan');
    }
};
