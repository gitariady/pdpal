
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
        Schema::create('petugas_pelayanan', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 45);
            $table->string('nama', 45);
            $table->string('jabatan', 45);
            $table->string('bidang', 45);
            $table->string('no_hp', 15);
            $table->string('email',35);
            $table->string('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petugas_pelayanan');
    }
};
