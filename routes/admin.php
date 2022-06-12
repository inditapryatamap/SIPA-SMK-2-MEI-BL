<?php

use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\siswa as Siswa;
use \App\Http\Controllers\admin as Admin;
use App\Http\Controllers\LoginController;


Route::get('/login-admin', [LoginController::class, 'loginAdmin'])->name('admin.login');
Route::post('/login-admin', [LoginController::class, 'goLoginAdmin'])->name('admin.go_login');

Route::group(['middleware' => 'auth:admin'], function() {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('admin.dashboard');

        Route::prefix('validasi')->group(function () {
            Route::prefix('magang-pkl')->group(function () {
                Route::get('/list', [Admin\ValidasiController::class, 'magangPKL'])->name('admin.magang-pkl');
                Route::get('/detail/{id_pengajuan}', [Admin\ValidasiController::class, 'detailMagangPKL'])->name('admin.magang-pkl.detail');
                Route::post('/go_update_pembimbing/{id_pengajuan}', [Admin\ValidasiController::class, 'go_update_pembimbing'])->name('admin.magang-pkl.go_update_pembimbing');
                Route::get('/go_update_status/{id_pengajuan}/{tipe}', [Admin\ValidasiController::class, 'go_update_status'])->name('admin.magang-pkl.go_update_status');
            });
            
            Route::prefix('perusahaan')->group(function () {
                Route::get('/list', [Admin\ValidasiController::class, 'perusahaan'])->name('admin.perusahaan');
                Route::get('/detail/{id_perusahaan}', [Admin\ValidasiController::class, 'detailPerusahaan'])->name('admin.perusahaan.detail');
                Route::get('/go_update_status/{id_perusahaan}/{tipe}', [Admin\ValidasiController::class, 'go_update_status_perusahaan'])->name('admin.perusahaan.go_update_status');
            });

        });

        Route::prefix('surat')->group(function () {
            Route::get('/list', [Admin\SuratController::class, 'index'])->name('admin.surat');
            Route::get('/detail/{id_surat}', [Admin\SuratController::class, 'detail'])->name('admin.surat.detail');
            Route::post('/go_update_file/{id_surat}', [Admin\SuratController::class, 'go_update_file'])->name('admin.surat.go_update_file');
        });

        Route::prefix('dokumen')->group(function () {
            Route::get('/list', [Admin\DokumenController::class, 'index'])->name('admin.dokumen');
            Route::get('/detail/{id_dokumen}', [Admin\DokumenController::class, 'detail'])->name('admin.dokumen.detail');
        });

        Route::prefix('siswa')->group(function () {
            Route::get('/list', [Admin\SiswaController::class, 'index'])->name('admin.siswa.list');
            Route::get('/create', [Admin\SiswaController::class, 'create'])->name('admin.siswa.create');
            Route::get('/update/{id_siswa}', [Admin\SiswaController::class, 'update'])->name('admin.siswa.update');
            Route::post('/go_create', [Admin\SiswaController::class, 'go_create'])->name('admin.siswa.go.create');
            Route::post('/go_update', [Admin\SiswaController::class, 'go_update'])->name('admin.siswa.go.update');
            Route::get('/go_delete/{id_siswa}', [Admin\SiswaController::class, 'go_delete'])->name('admin.siswa.go.delete');
        });

        Route::prefix('guru-pembimbing')->group(function () {
            Route::get('/list', [Admin\GuruPembimbingController::class, 'index'])->name('admin.guru-pembimbing.list');
            Route::get('/create', [Admin\GuruPembimbingController::class, 'create'])->name('admin.guru-pembimbing.create');
            Route::get('/update/{id_guru_pembimbing}', [Admin\GuruPembimbingController::class, 'update'])->name('admin.guru-pembimbing.update');
            Route::post('/go_create', [Admin\GuruPembimbingController::class, 'go_create'])->name('admin.guru-pembimbing.go.create');
            Route::post('/go_update', [Admin\GuruPembimbingController::class, 'go_update'])->name('admin.guru-pembimbing.go.update');
            Route::get('/go_delete/{id_guru_pembimbing}', [Admin\GuruPembimbingController::class, 'go_delete'])->name('admin.guru-pembimbing.go.delete');
        });

        Route::prefix('pembimbing-lapang')->group(function () {
            Route::get('/list', [Admin\PembimbingLapangController::class, 'index'])->name('admin.pembimbing-lapang.list');
            Route::get('/create', [Admin\PembimbingLapangController::class, 'create'])->name('admin.pembimbing-lapang.create');
            Route::get('/update/{id_pembimbing_lapang}', [Admin\PembimbingLapangController::class, 'update'])->name('admin.pembimbing-lapang.update');
            Route::post('/go_create', [Admin\PembimbingLapangController::class, 'go_create'])->name('admin.pembimbing-lapang.go.create');
            Route::post('/go_update', [Admin\PembimbingLapangController::class, 'go_update'])->name('admin.pembimbing-lapang.go.update');
            Route::get('/go_delete/{id_pembimbing_lapang}', [Admin\PembimbingLapangController::class, 'go_delete'])->name('admin.pembimbing-lapang.go.delete');
        });

        Route::prefix('master-data')->group(function () {
            
            Route::prefix('jurusan')->group(function () {
                Route::get('/list', [Admin\JurusanController::class, 'index'])->name('admin.master-data.jurusan.list');
                Route::get('/go_delete/{id_jurusan}', [Admin\JurusanController::class, 'go_delete'])->name('admin.master-data.jurusan.go.delete');
                Route::post('/go_create', [Admin\JurusanController::class, 'go_create'])->name('admin.master-data.jurusan.go.create');
                Route::post('/go_update', [Admin\JurusanController::class, 'go_update'])->name('admin.master-data.jurusan.go.update');
            });

            Route::prefix('kegiatan')->group(function () {
                Route::get('/list', [Admin\KegiatanController::class, 'index'])->name('admin.master-data.kegiatan.list');
                Route::get('/go_delete/{id_jurusan}', [Admin\KegiatanController::class, 'go_delete'])->name('admin.master-data.kegiatan.go.delete');
                Route::post('/go_create', [Admin\KegiatanController::class, 'go_create'])->name('admin.master-data.kegiatan.go.create');
                Route::post('/go_update', [Admin\KegiatanController::class, 'go_update'])->name('admin.master-data.kegiatan.go.update');
            });

            Route::prefix('jenis-surat')->group(function () {
                Route::get('/list', [Admin\JenisSuratController::class, 'index'])->name('admin.master-data.jenis-surat.list');
                Route::get('/go_delete/{id_jenis_surat}', [Admin\JenisSuratController::class, 'go_delete'])->name('admin.master-data.jenis-surat.go.delete');
                Route::post('/go_create', [Admin\JenisSuratController::class, 'go_create'])->name('admin.master-data.jenis-surat.go.create');
                Route::post('/go_update', [Admin\JenisSuratController::class, 'go_update'])->name('admin.master-data.jenis-surat.go.update');
            });
        });

    });
});
