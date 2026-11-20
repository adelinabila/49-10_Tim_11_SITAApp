<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Middleware\MahasiswaAccess;
use Illuminate\Support\Facades\Route;

Route::middleware(MahasiswaAccess::class . ':admin')->group(function () {
    Route::resource('mahasiswa', MahasiswaController::class)->except('show');
});
