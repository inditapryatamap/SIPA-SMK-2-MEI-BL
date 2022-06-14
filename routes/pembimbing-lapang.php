<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\siswa as Siswa;
use \App\Http\Controllers\pembimbing_lapang as PembimbingLapang;
use App\Http\Controllers\LoginController;

Route::get('/login-pembimbing-lapang', [LoginController::class, 'loginPembimbingLapang'])->name('pembimbing-lapang.login');
Route::post('/go-login-pembimbing-lapang', [LoginController::class, 'goLoginPembimbingLapang'])->name('pembimbing-lapang.go_login');

Route::group(['middleware' => 'auth:pembimbing-lapang'], function() {
    Route::prefix('pembimbing-lapang')->group(function () {
        Route::get('/dashboard', [PembimbingLapang\DashboardController::class, 'index'])->name('pembimbing-lapang.dashboard');

        Route::prefix('validasi')->group(function () {
          
            Route::prefix('jurnal-harian')->group(function () {
                Route::get('/list', [PembimbingLapang\JurnalHarianController::class, 'index'])->name('pembimbing-lapang.validasi.jurnal-harian.list');
                Route::get('/detail/{id_pengajuan}', [PembimbingLapang\JurnalHarianController::class, 'detail'])->name('pembimbing-lapang.validasi.jurnal-harian.detail');
                Route::get('/go_validasi/{id_jurnal_harian}/{tipe}', [PembimbingLapang\JurnalHarianController::class, 'go_validasi'])->name('pembimbing-lapang.validasi.jurnal-harian.go_validasi');
            });

            Route::prefix('penilaian')->group(function () {
                Route::get('/list', [PembimbingLapang\PenilaianController::class, 'index'])->name('pembimbing-lapang.validasi.penilaian.list');
                Route::get('/detail/{id_pengajuan}', [PembimbingLapang\PenilaianController::class, 'detail'])->name('pembimbing-lapang.validasi.penilaian.detail');
                Route::post('/go_save_jenis_kegiatan/{id_magang_pkl}', [PembimbingLapang\PenilaianController::class, 'go_save_jenis_kegiatan'])->name('pembimbing-lapang.validasi.penilaian.go_save_jenis_kegiatan');
            });

        });

        

        Route::prefix('penilaian')->group(function () {
            Route::get('/list', [PembimbingLapang\PenilaianController::class, 'index'])->name('pembimbing-lapang.penilaian.list');
        });
    });
});


