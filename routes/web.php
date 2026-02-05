<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\LayananController; 
use App\Models\Penduduk;
use App\Models\PengajuanSurat; 
use Illuminate\Support\Facades\Route;


// Halaman Depan 
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Fitur Warga: Ajukan Surat
Route::get('/ajukan-surat', [LayananController::class, 'create'])->name('layanan.create');
Route::post('/ajukan-surat', [LayananController::class, 'store'])->name('layanan.store');

// Fitur Warga: Cek Status (Tracking NIK)
Route::get('/cek-status', [LayananController::class, 'track'])->name('layanan.track');


// --- 2. JALUR KHUSUS ADMIN (Harus Login) ---
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard Admin 
    Route::get('/dashboard', function () {

        $totalPenduduk = Penduduk::count(); 
        $suratPending = PengajuanSurat::where('status', 'Pending')->count();
        $suratSelesai = PengajuanSurat::where('status', 'Disetujui')->count();
        $latestSurat = PengajuanSurat::where('status', 'Pending')->latest()->take(5)->get();
        return view('dashboard', compact('totalPenduduk', 'suratPending', 'suratSelesai', 'latestSurat'));
    })->name('dashboard');

    // Profile Admin
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- MANAJEMEN PENDUDUK (CRUD) ---
    Route::get('/penduduk', [PendudukController::class, 'index'])->name('penduduk.index');
    Route::get('/penduduk/create', [PendudukController::class, 'create'])->name('penduduk.create');
    Route::post('/penduduk', [PendudukController::class, 'store'])->name('penduduk.store');
    Route::get('/penduduk/{id}/edit', [PendudukController::class, 'edit'])->name('penduduk.edit');
    Route::put('/penduduk/{id}', [PendudukController::class, 'update'])->name('penduduk.update');
    Route::delete('/penduduk/{id}', [PendudukController::class, 'destroy'])->name('penduduk.destroy');

    // --- MANAJEMEN SURAT (Verifikasi Admin) ---
    Route::get('/admin/layanan', [LayananController::class, 'index'])->name('layanan.index');
    Route::patch('/admin/layanan/{id}', [LayananController::class, 'update'])->name('layanan.update');
    Route::get('/admin/layanan/{id}/cetak', [LayananController::class, 'show'])->name('layanan.show');
});

require __DIR__.'/auth.php';