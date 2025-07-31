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
        Schema::create('hasil_petugas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('proses_petugas_id')->unsigned();
            $table->string('jenis_layanan',50);
            $table->string('foto_hasil',100)->nullable();
            $table->string('tindak_lanjut');
            $table->string('masalah_ditemukan');
            $table->string('kesimpulan');
            $table->string('status_hasil',50);
            $table->timestamps();

            $table->foreign('proses_petugas_id')->references('id')->on('proses_petugas')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_petugas');
    }
};
