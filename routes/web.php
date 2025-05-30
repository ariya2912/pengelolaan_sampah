<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanSampahController;
use App\Http\Controllers\SetoranSampahController;
use App\Http\Controllers\PemesananLayananController;

// Redirect root to dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Form login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Proses login
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);

// Logout
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Group routes that require authentication
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Laporan Sampah (dulu: pengaduan)
    Route::resource('laporan_sampah', LaporanSampahController::class)
        ->names([
            'index'   => 'laporan.index',
            'create'  => 'laporan.create',
            'store'   => 'laporan.store',
            'show'    => 'laporan.show',
            'edit'    => 'laporan.edit',
            'update'  => 'laporan.update',
            'destroy' => 'laporan.destroy',
        ]);

    // Setoran Bank Sampah
    Route::resource('setoran_sampah', SetoranSampahController::class)
        ->names([
            'index'   => 'setoran.index',
            'create'  => 'setoran.create',
            'store'   => 'setoran.store',
            'show'    => 'setoran.show',
            'edit'    => 'setoran.edit',
            'update'  => 'setoran.update',
            'destroy' => 'setoran.destroy',
        ]);

    // Layanan Pengangkutan
    Route::resource('pemesanan_layanan', PemesananLayananController::class)
        ->names([
            'index'   => 'pengangkutan.index',
            'create'  => 'pengangkutan.create',
            'store'   => 'pengangkutan.store',
            'show'    => 'pengangkutan.show',
            'edit'    => 'pengangkutan.edit',
            'update'  => 'pengangkutan.update',
            'destroy' => 'pengangkutan.destroy',
        ]);
});
