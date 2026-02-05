<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
     * 1. INDEX: Menampilkan daftar penduduk (Beserta Fitur Cari)
     */
    public function index(Request $request)
    {
        $query = Penduduk::query();

        // Logika Pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('nik', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%");
            });
        }

        // Ambil data (10 per halaman)
        // PENTING: Variabel ini bernama $penduduks
        $penduduks = $query->latest()->paginate(10)->withQueryString();

        // Kirim variabel $penduduks ke view
        return view('penduduk.index', compact('penduduks'));
    }

    /**
     * 2. CREATE: Menampilkan form tambah
     */
    public function create()
    {
        return view('penduduk.create');
    }

    /**
     * 3. STORE: Menyimpan data baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|numeric|unique:penduduks,nik',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P,Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'status_perkawinan' => 'required|string',
            'pekerjaan' => 'required|string',
        ]);

        Penduduk::create($request->all());

        return redirect()->route('penduduk.index')->with('success', 'Data Penduduk berhasil ditambahkan.');
    }

    /**
     * 4. SHOW: Detail (Opsional)
     */
    public function show($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        return view('penduduk.show', compact('penduduk'));
    }

    /**
     * 5. EDIT: Menampilkan form edit (Menggunakan ID manual agar aman)
     */
    public function edit($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        return view('penduduk.edit', compact('penduduk'));
    }

    /**
     * 6. UPDATE: Menyimpan perubahan (Menggunakan ID manual agar aman)
     */
    public function update(Request $request, $id)
    {
        $penduduk = Penduduk::findOrFail($id);

        $request->validate([
            // Validasi unik kecuali untuk diri sendiri
            'nik' => 'required|numeric|unique:penduduks,nik,'.$id,
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P,Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'status_perkawinan' => 'required|string',
            'pekerjaan' => 'required|string',
        ]);

        $penduduk->update($request->all());

        return redirect()->route('penduduk.index')->with('success', 'Data Penduduk berhasil diperbarui.');
    }

    /**
     * 7. DESTROY: Menghapus data (Menggunakan ID manual agar aman)
     */
    public function destroy($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        $penduduk->delete();

        return redirect()->route('penduduk.index')->with('success', 'Data Penduduk berhasil dihapus.');
    }
}