<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect('/dashboard'));

Route::get('/dashboard', fn () => view('dashboard'));

Route::get('/pengaduan', fn () => view('pengaduan.index'));
Route::get('/setoran', fn () => view('setoran.index'));
Route::get('/pengangkutan', fn () => view('pengangkutan.index'));

use App\Http\Controllers\LaporanSampahController;
use App\Http\Controllers\SetoranSampahController;
use App\Http\Controllers\PemesananLayananController;

Route::middleware(['auth'])->group(function () {
    Route::resource('laporan_sampah', LaporanSampahController::class);
    Route::resource('setoran_sampah', SetoranSampahController::class);
    Route::resource('pemesanan_layanan', PemesananLayananController::class);
});
