<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class, 'index'])->name('/');
Route::get('/logout', [LoginController::class, 'postLogout'])->name('logout');


require_once "admin.php";
require_once "siswa.php";