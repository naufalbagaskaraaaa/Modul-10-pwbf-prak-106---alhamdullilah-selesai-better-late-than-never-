<?php

use App\Http\Controllers\Dokter\DashboardDokterController;
use App\Http\Controllers\Pemilik\DashboardPemilikController;
use App\Http\Controllers\Perawat\DashboardPerawatController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [SiteController::class, 'index'])->name('site.home');
Route::get('/layanan', [SiteController::class, 'layanan'])->name('site.layanan');
Route::get('/kontak', [SiteController::class, 'kontak'])->name('site.kontak');
Route::get('/struktur_organisasi', [SiteController::class, 'strukturOrganisasi'])->name('site.strukturOrganisasi');
Route::get('/login', [SiteController::class, 'login'])->name('site.login');

Route::get('/cek-koneksi', [SiteController::class, 'cekKoneksi'])->name('site.cek-koneksi');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('isAdministrator')->group(function() {
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardAdminController::class, 'index'])->name('admin.dashboard-admin');
    Route::get('/admin/jenis-hewan', [App\Http\Controllers\Admin\JenisHewanController::class, 'index'])->name('admin.jenis-hewan.index');
    Route::get('/admin/pemilik', [App\Http\Controllers\Admin\PemilikController::class, 'index'])->name('admin.pemilik.index');
    Route::get('/admin/kategori', [App\Http\Controllers\Admin\KategoriController::class, 'index'])->name('admin.kategori.index');
    Route::get('/admin/kategori-klinis', [App\Http\Controllers\Admin\KategoriKlinisController::class, 'index'])->name('admin.kategori-klinis.index');
    Route::get('/admin/kode-tindakan-terapi', [App\Http\Controllers\Admin\KodeTindakanTerapiController::class, 'index'])->name('admin.kode-tindakan-terapi.index');
    Route::get('/admin/pet', [App\Http\Controllers\Admin\PetController::class, 'index'])->name('admin.pet.index');
    Route::get('/admin/ras-hewan', [App\Http\Controllers\Admin\RasHewanController::class, 'index'])->name('admin.ras-hewan.index');
    Route::get('/admin/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');
    Route::get('/admin/role', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('admin.role.index');
    Route::get('/admin/user-role', [App\Http\Controllers\Admin\UserRoleController::class, 'index'])->name('admin.user-role.index');
});

Route::middleware('isResepsionis')->group(function(){
    Route::get('/resepsionis/dashboard', [App\Http\Controllers\Resepsionis\DashboardResepsionisController::class, 'index'])->name('resepsionis.dashboard-resepsionis');
    Route::get('/resepsionis/pendaftaran', [App\Http\Controllers\Resepsionis\DashboardResepsionisController::class, 'showPendaftaran'])->name('resepsionis.pendaftaran.index');
});

Route::middleware('isPemilik')->group(function () {
    Route::get('/pemilik/dashboard', [DashboardPemilikController::class, 'index'])->name('pemilik.dashboard-pemilik');
    Route::get('/pemilik/data-pet', [DashboardPemilikController::class, 'showPet'])->name('pemilik.data-pet.index');
});

Route::middleware('isPerawat')->group(function () {
    Route::get('/perawat/dashboard', [DashboardPerawatController::class, 'index'])->name('perawat.dashboard-perawat');
    Route::get('/perawat/rekam-medis', [DashboardPerawatController::class, 'showRekamMedis'])->name('perawat.rekam-medis.index');
});

Route::middleware('isDokter')->group(function () {
    Route::get('/dokter/dashboard', [DashboardDokterController::class, 'index'])->name('dokter.dashboard-dokter');
    Route::get('/dokter/rekam-medis', [DashboardDokterController::class, 'showRekamMedisDokter'])->name('dokter.rekam-medis.index');
});
