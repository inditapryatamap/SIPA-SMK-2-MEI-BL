<?php

use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\siswa as Siswa;
use \App\Http\Controllers\admin as Admin;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('siswa.dashboard');
// });
Route::get('/', [LoginController::class, 'index']);

Route::post('/login', [LoginController::class, 'postLogin'])->name('siswalogin');
Route::get('/dashboard', [Siswa\DashboardController::class, 'index'])->name('siswa.dashboard');
Route::get('/adm_dashboard', [Admin\DashboardController::class, 'index'])->name('admin.dashboard');

Route::prefix('siswa')->group(function () {

    Route::get('dashboard', [Siswa\DashboardController::class, 'index'])->name('siswa.dashboard');

    Route::prefix('pengajuan')->group(function () {
        Route::get('magang_pkl', [Siswa\PengajuanController::class, 'pengajuan_magang_pkl'])->name('pengajuan_magang_pkl');
        Route::post('go_create_pkl_magang', [Siswa\PengajuanController::class, 'go_create_pkl_magang'])->name('go_create_pkl_magang');

        Route::get('perusahaan', [Siswa\PengajuanController::class, 'pengajuan_perusahaan'])->name('pengajuan_perusahaan');
        Route::post('go_create_perusahaan', [Siswa\PengajuanController::class, 'go_create_perusahaan'])->name('go_create_perusahaan');
    });

    Route::get('buat_surat', [Siswa\SuratController::class, 'index'])->name('buat_surat');
    Route::get('unggah_dokumen', [Siswa\DokumenController::class, 'index'])->name('unggah_dokumen');
    Route::post('go_create_dokumen_review', [Siswa\DokumenController::class, 'go_create_dokumen_review'])->name('go_create_dokumen_review');
});