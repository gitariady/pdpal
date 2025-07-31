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
        Schema::create('tagihan_perbaikan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('proses_petugas_id')->unsigned();
            $table->string('pdpal_id')->nullable();
            $table->string('bukti_tagihan',100);
            $table->string('bukti_bayar',100)->nullable();
            $table->string('metode',30);
            $table->integer('total');
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('proses_petugas_id')->references('id')->on('proses_petugas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihan_perbaikan');
    }
};
