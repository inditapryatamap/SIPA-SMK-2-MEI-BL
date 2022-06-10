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
            });
        });
    });
});
