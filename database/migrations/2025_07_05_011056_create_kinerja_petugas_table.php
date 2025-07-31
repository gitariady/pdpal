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
        Schema::create('kinerja_petugas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('petugas_id')->unsigned();
            $table->bigInteger('laporan_id')->unsigned();
            $table->string('kegiatan_kerja');
            $table->tinyInteger('ketepatan_waktu')->comment('1-5');
            $table->tinyInteger('kepuasan_masyarakat')->comment('1-5');
            $table->tinyInteger('sikap_kerja')->comment('1-5');
            $table->tinyInteger('nilai_total')->nullable()->comment('Total dari semua penilaian');
            $table->timestamps();

            $table->foreign('petugas_id')->references('id')->on('petugas_pelayanan')->onDelete('cascade');
            $table->foreign('laporan_id')->references('id')->on('laporan')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kinerja_petugas');
    }
};
