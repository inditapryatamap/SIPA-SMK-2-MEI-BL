<?php

use App\Http\Controllers\ExportController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/logout', [LoginController::class, 'postLogout'])->name('logout');

Route::get('/', [LandingController::class, 'index'])->name('/');
Route::get('/contact', [LandingController::class, 'contact'])->name('contact');
Route::get('/faq', [LandingController::class, 'faq'])->name('faq');
Route::get('/forgot-password', [LandingController::class, 'forgot_password'])->name('forgot_password');
Route::post('/go-forgot-password', [LandingController::class, 'go_forgot_password'])->name('go_forgot_password');



Route::prefix('export')->group(function () {
    Route::get('/siswa', [ExportController::class, 'siswa'])->name('export.siswa');
    Route::get('/perusahaan', [ExportController::class, 'perusahaan'])->name('export.perusahaan');
});

require_once "admin.php";
require_once "siswa.php";
require_once "guru-pembimbing.php";
require_once "pembimbing-lapang.php";