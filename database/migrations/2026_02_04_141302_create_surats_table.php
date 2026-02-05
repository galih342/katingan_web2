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
 Schema::create('surats', function (Blueprint $table) {
    $table->id();
    $table->string('nik_pemohon'); // NIK warga yang mengajukan
    $table->string('jenis_surat'); // Misal: SKTM, Domisili
    $table->enum('status', ['pending', 'proses', 'selesai', 'ditolak'])->default('pending');
    $table->string('file_surat')->nullable(); // Link file PDF nanti
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
