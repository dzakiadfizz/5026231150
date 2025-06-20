<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DosenController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MalasngodingController;
use App\Http\Controllers\HarddiskController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LatihanA1Controller;
use App\Http\Controllers\KeranjangBelanjaController;
use App\Http\Controllers\NilaiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('halo', function () {
    return "Halo, Selamat datang di tutorial laravel www.malasngoding.com";
});

Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');

Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
Route::get('/pegawai/tambah', [PegawaiController::class, 'tambah'])->name('pegawai.tambah');
Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit'])->name('pegawai.edit');
Route::post('/pegawai/update', [PegawaiController::class, 'update'])->name('pegawai.update');
Route::get('/pegawai/hapus/{id}', [PegawaiController::class, 'hapus'])->name('pegawai.hapus');
Route::get('/pegawai/cari', [PegawaiController::class, 'cari'])->name('pegawai.cari');

Route::get('/formulir-pegawai', [PegawaiController::class, 'formulir'])->name('pegawai.formulir');
Route::post('/proses-pegawai', [PegawaiController::class, 'proses'])->name('pegawai.proses');

Route::get('/blog', [BlogController::class, 'home'])->name('blog.home');
Route::get('/blog/tentang', [BlogController::class, 'tentang'])->name('blog.tentang');
Route::get('/blog/kontak', [BlogController::class, 'kontak'])->name('blog.kontak');

Route::get('/input', [MalasngodingController::class, 'input'])->name('malasngoding.input');
Route::post('/proses', [MalasngodingController::class, 'proses'])->name('malasngoding.proses');

Route::get('/harddisk', [HarddiskController::class, 'index'])->name('harddisk.index');
Route::get('/harddisk/tambah', [HarddiskController::class, 'tambah'])->name('harddisk.tambah');
Route::post('/harddisk/store', [HarddiskController::class, 'store'])->name('harddisk.store');
Route::get('/harddisk/edit/{id}', [HarddiskController::class, 'edit'])->name('harddisk.edit');
Route::post('/harddisk/update', [HarddiskController::class, 'update'])->name('harddisk.update');
Route::get('/harddisk/hapus/{id}', [HarddiskController::class, 'hapus'])->name('harddisk.hapus');
Route::get('/harddisk/cari', [HarddiskController::class, 'cari'])->name('harddisk.cari');

Route::get('/formulir-harddisk', [HarddiskController::class, 'formulir'])->name('harddisk.formulir');
Route::post('/proses-harddisk', [HarddiskController::class, 'proses'])->name('harddisk.proses');

Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::get('/karyawan/tambah', [KaryawanController::class, 'tambah'])->name('karyawan.tambah');
Route::post('/karyawan/store', [KaryawanController::class, 'store'])->name('karyawan.store');
Route::get('/karyawan/edit/{kodepegawai}', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::put('/karyawan/update/{kodepegawai}', [KaryawanController::class, 'update'])->name('karyawan.update');
Route::delete('/karyawan/hapus/{kodepegawai}', [KaryawanController::class, 'hapus'])->name('karyawan.hapus');


Route::get('/latihanA1', [LatihanA1Controller::class, 'index5']);

Route::get('/keranjangbelanja', [KeranjangBelanjaController::class,'index3']);
Route::get('/keranjangbelanja/tambah', [KeranjangBelanjaController::class,'tambah3']);
Route::post('/keranjangbelanja/store', [KeranjangBelanjaController::class,'store']);
Route::post('/keranjangbelanja/update', [KeranjangBelanjaController::class,'update']);
Route::get('/keranjangbelanja/hapus/{id}',[KeranjangBelanjaController::class,'hapus']);

Route::get('/eas', [NilaiController::class, 'index']);
Route::get('/eas/tambah', [NilaiController::class, 'create']);
Route::post('/eas/store', [NilaiController::class, 'store']);

