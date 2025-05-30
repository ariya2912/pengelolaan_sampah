<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanSampahController;
use App\Http\Controllers\SetoranSampahController;
use App\Http\Controllers\PemesananLayananController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    if (Auth::check()) {
        $role = Auth::user()->role;

        return match ($role) {
            'admin' => redirect()->route('admin.dashboard'),
            'petugas' => redirect()->route('petugas.dashboard'),
            'masyarakat' => redirect()->route('masyarakat.dashboard'),
            default => abort(403, 'Role tidak dikenali.'),
        };
    }

    return redirect()->route('login');
});

// Halaman login & register
Route::get('/login', fn () => view('auth.login'))->name('login')->middleware('guest');
Route::get('/register', fn () => view('auth.register'))->name('register')->middleware('guest');

// Proses login & register
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::post('/register', [RegisterController::class, 'register'])->name('register.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ==========================
// Route Role Admin
// ==========================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Tambah route admin lainnya di sini
});

// ==========================
// Route Role Petugas
// ==========================
Route::middleware(['auth', 'role:petugas'])->prefix('petugas')->name('petugas.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Tambah route petugas lainnya di sini
});

// ==========================
// Route Role Masyarakat
// ==========================
Route::middleware(['auth', 'role:masyarakat'])->prefix('masyarakat')->name('masyarakat.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Laporan Sampah
    Route::resource('laporan_sampah', LaporanSampahController::class)->names([
        'index'   => 'laporan.index',
        'create'  => 'laporan.create',
        'store'   => 'laporan.store',
        'show'    => 'laporan.show',
        'edit'    => 'laporan.edit',
        'update'  => 'laporan.update',
        'destroy' => 'laporan.destroy',
    ]);

    // Setoran Bank Sampah
    Route::resource('setoran_sampah', SetoranSampahController::class)->names([
        'index'   => 'setoran.index',
        'create'  => 'setoran.create',
        'store'   => 'setoran.store',
        'show'    => 'setoran.show',
        'edit'    => 'setoran.edit',
        'update'  => 'setoran.update',
        'destroy' => 'setoran.destroy',
    ]);

    // Layanan Pengangkutan
    Route::resource('pemesanan_layanan', PemesananLayananController::class)->names([
        'index'   => 'pengangkutan.index',
        'create'  => 'pengangkutan.create',
        'store'   => 'pengangkutan.store',
        'show'    => 'pengangkutan.show',
        'edit'    => 'pengangkutan.edit',
        'update'  => 'pengangkutan.update',
        'destroy' => 'pengangkutan.destroy',
    ]);
});
