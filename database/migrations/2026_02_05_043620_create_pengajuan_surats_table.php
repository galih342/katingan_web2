<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    // Tabel Pengajuan Surat (Layanan Publik)
    Schema::create('pengajuan_surats', function (Blueprint $table) {
        $table->id();
        $table->string('nama_pemohon');
        $table->string('nik_pemohon');
        $table->string('jenis_surat'); // Domisili, Usaha, dll
        $table->string('status')->default('Pending'); // Pending, Disetujui, Ditolak
        $table->text('keterangan')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_surats');
    }
};
