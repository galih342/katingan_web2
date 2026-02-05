<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Kita membuat tabel dengan nama 'penduduk' (sesuai Model)
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            
            // Kolom-kolom data
            $table->string('nik')->unique(); // NIK tidak boleh kembar
            $table->string('nama');
            $table->enum('jenis_kelamin', ['L', 'P']); // Hanya boleh L atau P
            $table->text('alamat');
            $table->string('pekerjaan');
            
            $table->timestamps(); // Untuk mencatat kapan dibuat/diedit
        });
    }

    public function down()
    {
        Schema::dropIfExists('penduduk');
    }
};