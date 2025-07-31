<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('edukasi_sosial', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('petugas_id')->unsigned();
            $table->string('nama_kegiatan',);
            $table->string('tempat',50);
            $table->string('materi');
            $table->string('point');
            $table->integer('orang');
            $table->string('tanggapan');
            $table->string('absensi',100)->nullable();
            $table->string('bukti_kegiatan',100)->nullable();
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('petugas_id')->references('id')->on('petugas_pelayanan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('edukasi_sosial');
    }
};
