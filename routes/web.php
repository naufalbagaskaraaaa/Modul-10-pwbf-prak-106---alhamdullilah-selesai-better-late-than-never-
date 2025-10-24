<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [SiteController::class, 'index'])->name('site.home');
Route::get('/layanan', [SiteController::class, 'layanan'])->name('site.layanan');
Route::get('/kontak', [SiteController::class, 'kontak'])->name('site.kontak');
Route::get('/struktur_organisasi', [SiteController::class, 'strukturOrganisasi'])->name('site.strukturOrganisasi');
Route::get('/login', [SiteController::class, 'login'])->name('site.login');

Route::get('/cek-koneksi', [SiteController::class, 'cekKoneksi'])->name('site.cek-koneksi');

Route::get('/admin/jenis-hewan', [App\Http\Controllers\Admin\JenisHewanController::class, 'index'])->name('admin.jenis-hewan.index');
Route::get('/admin/pemilik', [App\Http\Controllers\Admin\PemilikController::class, 'index'])->name('admin.pemilik.index');
Route::get('/admin/kategori', [App\Http\Controllers\Admin\KategoriController::class, 'index'])->name('admin.kategori.index');
Route::get('/admin/kategoriKlinis', [App\Http\Controllers\Admin\KategoriKlinisController::class, 'index'])->name('admin.kategoriKlinis.index');
Route::get('/admin/kodeTindakanTerapi', [App\Http\Controllers\Admin\KodeTindakanTerapiController::class, 'index'])->name('admin.kodeTindakanTerapi.index');
Route::get('/admin/pet', [App\Http\Controllers\Admin\PetController::class, 'index'])->name('admin.pet.index');
Route::get('/admin/kategoriKlinis', [App\Http\Controllers\Admin\KategoriKlinisController::class, 'index'])->name('admin.kategoriKlinis.index');
Route::get('/admin/rasHewan', [App\Http\Controllers\Admin\RasHewanController::class, 'index'])->name('admin.rasHewan.index');
Route::get('/admin/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');