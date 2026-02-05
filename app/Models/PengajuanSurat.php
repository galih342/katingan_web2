<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanSurat extends Model
{
    use HasFactory;

    // Menentukan kolom mana saja yang boleh diisi oleh user
    protected $fillable = [
        'nama_pemohon',
        'nik_pemohon',
        'jenis_surat',
        'keterangan',
        'status',
    ];
}