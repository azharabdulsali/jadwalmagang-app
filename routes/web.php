<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DospemController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\JadwalMagangController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TempatMagangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {
    // Jadwal Magang
    Route::get('/jadwalMagang', [JadwalMagangController::class, 'index']);
    Route::get('/jadwalMagang/create', [JadwalMagangController::class, 'create']);
    Route::post('/jadwalMagang/store', [JadwalMagangController::class, 'store']);
    Route::get('/jadwalMagang/edit/{id}', [JadwalMagangController::class, 'edit']);
    Route::post('/jadwalMagang/update/{id}', [JadwalMagangController::class, 'update']);
    Route::get('/jadwalMagang/delete/{id}', [JadwalMagangController::class, 'delete']);
    Route::get('/jadwalMagang/print', [JadwalMagangController::class, 'print'])->name('jadwalMagang.print');

    // Mahasiswa
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index')->middleware('auth');
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('/mahasiswa/store', [MahasiswaController::class, 'store']);
    Route::get('/mahasiswa/edit/{nim}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::post('/mahasiswa/update/{nim}', [MahasiswaController::class, 'update']);
    Route::get('/mahasiswa/delete/{nim}', [MahasiswaController::class, 'delete'])->name('mahasiswa.destroy')->middleware('auth');

    // Dospem
    Route::get('/dospem', [DospemController::class, 'index'])->name('dospem.index');
    Route::get('/dospem/create', [DospemController::class, 'create'])->name('dospem.create');
    Route::post('/dospem/store', [DospemController::class, 'store'])->name('dospem.store');
    Route::get('/dospem/edit/{nik}', [DospemController::class, 'edit'])->name('dospem.edit');
    Route::post('/dospem/update/{nik}', [DospemController::class, 'update'])->name('dospem.update');
    Route::get('/dospem/delete/{nik}', [DospemController::class, 'delete'])->name('dospem.destroy');

    // Tempat Magang
    Route::get('/tempatMagang', [TempatMagangController::class, 'index'])->name('tempatMagang.index');
    Route::get('/tempatMagang/create', [TempatMagangController::class, 'create'])->name('tempatMagang.create');
    Route::post('/tempatMagang/store', [TempatMagangController::class, 'store'])->name('tempatMagang.store');
    Route::get('/tempatMagang/edit/{id}', [TempatMagangController::class, 'edit'])->name('tempatMagang.edit');
    Route::post('/tempatMagang/update/{id}', [TempatMagangController::class, 'update'])->name('tempatMagang.update');
    Route::get('/tempatMagang/delete/{id}', [TempatMagangController::class, 'delete'])->name('tempatMagang.destroy');
});


// Login
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [RegisterController::class, 'index']);
