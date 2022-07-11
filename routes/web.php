<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/logout', [LoginController::class, 'postLogout'])->name('logout');

Route::get('/', [LandingController::class, 'index'])->name('/');
Route::get('/contact', [LandingController::class, 'contact'])->name('contact');
Route::get('/faq', [LandingController::class, 'faq'])->name('faq');

require_once "admin.php";
require_once "siswa.php";
require_once "guru-pembimbing.php";
require_once "pembimbing-lapang.php";