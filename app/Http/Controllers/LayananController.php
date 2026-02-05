<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSurat;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    // --- FITUR UNTUK WARGA (PUBLIK) ---

    public function create()
    {
        return view('layanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemohon' => 'required',
            'nik_pemohon' => 'required|numeric',
            'jenis_surat' => 'required',
            'keterangan' => 'required',
        ]);

        PengajuanSurat::create([
            'nama_pemohon' => $request->nama_pemohon,
            'nik_pemohon' => $request->nik_pemohon,
            'jenis_surat' => $request->jenis_surat,
            'keterangan' => $request->keterangan,
            'status' => 'Pending', // Status awal
        ]);

        return redirect()->route('welcome')->with('success', 'Surat berhasil diajukan! Silakan cek status secara berkala.');
    }

    public function track(Request $request)
    {
        $riwayat = [];
        if ($request->has('nik')) {
            $riwayat = PengajuanSurat::where('nik_pemohon', $request->nik)
                        ->orderBy('created_at', 'desc')
                        ->get();
        }
        return view('layanan.track', compact('riwayat'));
    }

    // --- FITUR UNTUK ADMIN (LOGIN) ---

    // 1. Tampilkan Daftar Surat Masuk
    public function index()
    {
        // Urutkan: Pending paling atas, lalu berdasarkan tanggal terbaru
        $dataSurat = PengajuanSurat::orderByRaw("FIELD(status, 'Pending', 'Disetujui', 'Ditolak')")
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('admin.layanan.index', compact('dataSurat'));
    }

    // 2. Proses Verifikasi (Terima/Tolak)
    public function update(Request $request, $id)
    {
        $surat = PengajuanSurat::findOrFail($id);
        
        // Update status sesuai tombol yang diklik admin
        $surat->status = $request->status; 
        $surat->save();

        return redirect()->back()->with('success', 'Status surat berhasil diperbarui.');
    }

    // 3. Lihat/Cetak Surat (Format Resmi)
    public function show($id)
    {
        $surat = PengajuanSurat::findOrFail($id);
        return view('admin.layanan.show', compact('surat'));
    }
}