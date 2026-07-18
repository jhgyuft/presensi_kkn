<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PresensiController;

/*
|--------------------------------------------------------------------------
| Halaman Utama
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Presensi Public (Scan QR)
|--------------------------------------------------------------------------
*/

Route::get('/absen', [PresensiController::class, 'form'])
    ->name('presensi.form');

Route::post('/absen', [PresensiController::class, 'storePresensi'])
    ->name('presensi.store.public');

Route::get('/presensi/sukses', function () {
    return view('presensi.success');
})->name('presensi.success');

/*
|--------------------------------------------------------------------------
| Area Sekretaris (Login)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/rekap/export-excel', [PresensiController::class, 'exportExcel'])
        ->name('presensi.export.excel');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // CRUD Mahasiswa
    Route::resource('mahasiswa', MahasiswaController::class)
        ->except('show');

    Route::get('/qrcode', [PresensiController::class, 'qrcode'])
        ->name('qrcode');

    Route::get('/qrcode/download', [PresensiController::class, 'downloadQr'])
        ->name('qrcode.download');    

    // Rekap Presensi
    Route::get('/rekap', [PresensiController::class, 'rekap'])
        ->name('presensi.rekap');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';