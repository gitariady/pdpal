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
        Schema::create('berhenti_berlangganan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('petugas_id')->unsigned();
            $table->integer('pdpal_id')->nullable();
            $table->string('bukti_berhenti',100);
            $table->string('bukti_pdam',100);
            $table->string('ktp',100);
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
        Schema::dropIfExists('berhenti_berlangganan');
    }
};
