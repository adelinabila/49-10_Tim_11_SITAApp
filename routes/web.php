<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RuangSidangController;

Route::get('/', function () {
    return auth()->check() ? redirect('/dashboard') : redirect('/login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Menu 4 Modul
    Route::view('/topik', 'coming-soon', ['modul' => 'Modul A: Topik & Bidang Minat', 'pic' => 'Individu A'])->name('topik.index');
    Route::view('/dosen', 'coming-soon', ['modul' => 'Modul B: Dosen Pembimbing', 'pic' => 'Individu B (Adel)'])->name('dosen.index');
    Route::view('/mahasiswa', 'coming-soon', ['modul' => 'Modul C: Data Mahasiswa', 'pic' => 'Individu C'])->name('mahasiswa.index');

    // Modul D: Ruang & Fasilitas Sidang
    Route::resource('/ruang', RuangSidangController::class)->names('ruang-sidang');
    Route::get('/ruang-list', [RuangSidangController::class, 'index'])->name('ruang.index');
});