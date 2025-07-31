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
        Schema::create('konsultasi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('petugas_id')->unsigned();
            $table->string('nama', 50);
            $table->string('email', 50)->nullable();
            $table->string('no_hp', 15)->nullable();
            $table->string('bangunan', 50);
            $table->string('luas_bangunan', 30);
            $table->integer('orang');
            $table->string('pertanyaan');
            $table->string('keterangan');
            $table->string('bukti_konsultasi', 100)->nullable();
            $table->string('ktp', 100)->nullable();
            $table->string('status',50);
            $table->timestamps();

            $table->foreign('petugas_id')->references('id')->on('petugas_pelayanan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsultasi');
    }
};
