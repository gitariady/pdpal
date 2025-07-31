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
        Schema::create('proses_petugas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('petugas_id')->unsigned();
            $table->bigInteger('laporan_id')->unsigned();
            $table->bigInteger('kendaraan_id')->unsigned();
            $table->string('nomor_proses_kegiatan');
            $table->dateTime('awal');
            $table->dateTime('akhir');
            $table->string('kendala');
            $table->string('solusi');
            $table->string('status_proses');
            $table->string('bukti',100)->nullable();
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('petugas_id')->references('id')->on('petugas_pelayanan')->onDelete('cascade');
            $table->foreign('laporan_id')->references('id')->on('laporan')->onDelete('cascade');
            $table->foreign('kendaraan_id')->references('id')->on('kendaraan')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proses_petugas');
    }
};
