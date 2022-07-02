<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\siswa as Siswa;
use \App\Http\Controllers\guru_pembimbing as GuruPembimbing;
use App\Http\Controllers\LoginController;

Route::get('/login-guru-pembimbing', [LoginController::class, 'loginGuruPembimbing'])->name('guru-pembimbing.login');
Route::post('/go-login-guru-pembimbing', [LoginController::class, 'goLoginGuruPembimbing'])->name('guru-pembimbing.go_login');

Route::group(['middleware' => 'auth:guru-pembimbing'], function() {
    Route::prefix('guru-pembimbing')->group(function () {
        Route::get('/dashboard', [GuruPembimbing\DashboardController::class, 'index'])->name('guru-pembimbing.dashboard');

        Route::prefix('jurnal-harian')->group(function () {
            Route::get('/list', [GuruPembimbing\JurnalHarianController::class, 'index'])->name('guru-pembimbing.jurnal-harian.list');
            Route::get('/detail/{id_pengajuan}', [GuruPembimbing\JurnalHarianController::class, 'detail'])->name('guru-pembimbing.jurnal-harian.detail');
            Route::get('/go_validasi/{id_jurnal_harian}/{tipe}', [GuruPembimbing\JurnalHarianController::class, 'go_validasi'])->name('guru-pembimbing.jurnal-harian.go_validasi');
        });

        Route::prefix('dokumen')->group(function () {
            Route::get('/list/{tipe}', [GuruPembimbing\DokumenController::class, 'index'])->name('guru-pembimbing.dokumen');
            Route::get('/detail/{id_dokumen}', [GuruPembimbing\DokumenController::class, 'detail'])->name('guru-pembimbing.dokumen.detail');
            Route::get('/go_validasi/{id_dokumen}/{tipe}', [GuruPembimbing\DokumenController::class, 'go_validasi'])->name('guru-pembimbing.dokumen.go_validasi');
        });

    });
});


