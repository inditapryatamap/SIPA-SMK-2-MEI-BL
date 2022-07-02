<?php

use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\siswa as Siswa;
use \App\Http\Controllers\admin as Admin;
use App\Http\Controllers\LoginController;

Route::get('/login-siswa', [LoginController::class, 'loginSiswa'])->name('siswa.login');
Route::post('/go-login-siswa', [LoginController::class, 'goLoginSiswa'])->name('siswa.go_login');

Route::group(['middleware' => 'auth:siswa'], function() {
    Route::prefix('siswa')->group(function () {

        Route::get('dashboard', [Siswa\DashboardController::class, 'index'])->name('siswa.dashboard');

        Route::prefix('pengumuman')->group(function () {
            Route::get('/detail/{id_pengumuman}', [Siswa\PengumumanController::class, 'detail'])->name('siswa.pengumuman.detail');
        });

        Route::prefix('pengajuan')->group(function () {
            Route::get('magang_pkl', [Siswa\PengajuanController::class, 'pengajuan_magang_pkl'])->name('pengajuan_magang_pkl');
            Route::post('go_create_pkl_magang', [Siswa\PengajuanController::class, 'go_create_pkl_magang'])->name('go_create_pkl_magang');

            Route::get('perusahaan', [Siswa\PengajuanController::class, 'pengajuan_perusahaan'])->name('pengajuan_perusahaan');
            Route::post('go_create_perusahaan', [Siswa\PengajuanController::class, 'go_create_perusahaan'])->name('go_create_perusahaan');
            Route::get('go_delete_pkl_magang/{id_pengajuan}', [Siswa\PengajuanController::class, 'go_delete_pkl_magang'])->name('go_delete_pkl_magang');
        });

        Route::prefix('surat')->group(function () {
            Route::get('list', [Siswa\SuratController::class, 'index'])->name('surat.list');
            Route::get('create', [Siswa\SuratController::class, 'create'])->name('surat.create');
            Route::post('go_create_surat', [Siswa\SuratController::class, 'go_create_surat'])->name('surat.go_create_surat');
        });

        Route::prefix('riwayat-kegiatan')->group(function () {
            Route::prefix('jurnal-harian')->group(function () {
                Route::get('list', [Siswa\JurnalHarianController::class, 'index'])->name('riwayat.jurnal.list');
                Route::post('create', [Siswa\JurnalHarianController::class, 'go_create'])->name('riwayat.jurnal.go_create');
            });

            Route::prefix('absensi')->group(function () {
                Route::get('list', [Siswa\AbsensiController::class, 'index'])->name('riwayat.absensi.list');
                Route::post('create', [Siswa\AbsensiController::class, 'go_create'])->name('riwayat.absensi.go_create');
            });

            Route::prefix('penilaian')->group(function () {
                Route::get('list', [Siswa\PenilaianController::class, 'index'])->name('riwayat.penilaian.list');
            });

            Route::prefix('kuesioner')->group(function () {
                Route::get('/list', [Siswa\KuesionerController::class, 'index'])->name('riwayat.kuesioner.list');
                Route::post('/go_save_kuesioner', [Siswa\KuesionerController::class, 'go_save_kuesioner'])->name('riwayat.kuesioner.go_save_kuesioner');
                Route::get('/go_delete_kuesioner', [Siswa\KuesionerController::class, 'go_delete_kuesioner'])->name('riwayat.kuesioner.go_delete_kuesioner');
            });

        });

        Route::prefix('dokumen')->group(function () {
            Route::get('list', [Siswa\DokumenController::class, 'index'])->name('siswa.dokumen.list');
            Route::get('detail/{id_dokumen}', [Siswa\DokumenController::class, 'detail'])->name('siswa.dokumen.detail');
            Route::post('go_create_dokumen_individu/{id_magang_pkl}', [Siswa\DokumenController::class, 'go_create_dokumen_individu'])->name('siswa.dokumen.go_create_dokumen_individu');
            Route::post('go_create_dokumen_kelompok/{id_magang_pkl}', [Siswa\DokumenController::class, 'go_create_dokumen_kelompok'])->name('siswa.dokumen.go_create_dokumen_kelompok');
        });

        Route::get('buat_surat', [Siswa\SuratController::class, 'index'])->name('buat_surat');
        
        Route::post('go_create_dokumen_review', [Siswa\DokumenController::class, 'go_create_dokumen_review'])->name('go_create_dokumen_review');
    });
});