<?php

use Illuminate\Support\Facades\Route;

// --- Rute Umum / Default ---
Route::get('/', function () {
    return view('welcome'); // Rute default aplikasi Laravel
});

Route::get('halo', function () {
    return "Halo, Selamat datang di tutorial laravel www.malasngoding.com";
});

// --- Rute untuk Dosen ---
use App\Http\Controllers\DosenController;
Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index'); // Menambahkan nama rute

// --- Rute untuk Pegawai ---
use App\Http\Controllers\PegawaiController;
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
Route::get('/pegawai/tambah', [PegawaiController::class, 'tambah'])->name('pegawai.tambah');
Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit'])->name('pegawai.edit');
Route::post('/pegawai/update', [PegawaiController::class, 'update'])->name('pegawai.update'); // Update dengan method POST
Route::get('/pegawai/hapus/{id}', [PegawaiController::class, 'hapus'])->name('pegawai.hapus');
Route::get('/pegawai/cari', [PegawaiController::class, 'cari'])->name('pegawai.cari');

// Rute formulir dan proses yang spesifik untuk Pegawai
// Pastikan metode 'formulir' dan 'proses' ada di PegawaiController.
Route::get('/formulir-pegawai', [PegawaiController::class, 'formulir'])->name('pegawai.formulir');
Route::post('/proses-pegawai', [PegawaiController::class, 'proses'])->name('pegawai.proses');


// --- Rute untuk Blog ---
use App\Http\Controllers\BlogController;
Route::get('/blog', [BlogController::class, 'home'])->name('blog.home');
Route::get('/blog/tentang', [BlogController::class, 'tentang'])->name('blog.tentang');
Route::get('/blog/kontak', [BlogController::class, 'kontak'])->name('blog.kontak');

// --- Rute untuk Malasngoding ---
use App\Http\Controllers\MalasngodingController;
Route::get('/input', [MalasngodingController::class, 'input'])->name('malasngoding.input');
Route::post('/proses', [MalasngodingController::class, 'proses'])->name('malasngoding.proses'); // Ini adalah rute 'proses' umum. Pastikan tidak konflik dengan yang lain jika ada.

// --- Rute untuk Harddisk ---
use App\Http\Controllers\HarddiskController;
Route::get('/harddisk', [HarddiskController::class, 'index'])->name('harddisk.index');
Route::get('/harddisk/tambah', [HarddiskController::class, 'tambah'])->name('harddisk.tambah');
Route::post('/harddisk/store', [HarddiskController::class, 'store'])->name('harddisk.store');
Route::get('/harddisk/edit/{id}', [HarddiskController::class, 'edit'])->name('harddisk.edit');
Route::post('/harddisk/update', [HarddiskController::class, 'update'])->name('harddisk.update'); // Update dengan method POST
Route::get('/harddisk/hapus/{id}', [HarddiskController::class, 'hapus'])->name('harddisk.hapus');
Route::get('/harddisk/cari', [HarddiskController::class, 'cari'])->name('harddisk.cari');
Route::get('/formulir-harddisk', [HarddiskController::class, 'formulir'])->name('harddisk.formulir');
Route::post('/proses-harddisk', [HarddiskController::class, 'proses'])->name('harddisk.proses');
