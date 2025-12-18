<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\JenisHewanController;
use App\Http\Controllers\Admin\PemilikController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\KategoriKlinisController;
use App\Http\Controllers\Admin\KodeTindakanTerapiController;
use App\Http\Controllers\Admin\PetController;
use App\Http\Controllers\Admin\RasHewanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\Admin\AdminTransaksiController;
use App\Http\Controllers\Resepsionis\DashboardResepsionisController;
use App\Http\Controllers\Dokter\DashboardDokterController;
use App\Http\Controllers\Pemilik\DashboardPemilikController;
use App\Http\Controllers\Perawat\DashboardPerawatController;

Route::get('/', [SiteController::class, 'index'])->name('site.home');
Route::get('/layanan', [SiteController::class, 'layanan'])->name('site.layanan');
Route::get('/kontak', [SiteController::class, 'kontak'])->name('site.kontak');
Route::get('/struktur_organisasi', [SiteController::class, 'strukturOrganisasi'])->name('site.strukturOrganisasi');
Route::get('/login', [SiteController::class, 'login'])->name('site.login');
Route::get('/cek-koneksi', [SiteController::class, 'cekKoneksi'])->name('site.cek-koneksi');

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['isAdministrator'])->group(function() {
 
    Route::get('/admin/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard-admin');

    Route::get('/admin/jenis-hewan', [JenisHewanController::class, 'index'])->name('admin.jenis-hewan.index');
    Route::get('/admin/jenis-hewan/create', [JenisHewanController::class, 'create'])->name('admin.jenis-hewan.create');
    Route::post('/admin/jenis-hewan/store', [JenisHewanController::class, 'store'])->name('admin.jenis-hewan.store');
    
    Route::get('/admin/jenis-hewan/edit/{id}', [JenisHewanController::class, 'edit'])->name('admin.jenis-hewan.edit');
    Route::post('/admin/jenis-hewan/update/{id}', [JenisHewanController::class, 'update'])->name('admin.jenis-hewan.update'); 
    Route::get('/admin/jenis-hewan/delete/{id}', [JenisHewanController::class, 'destroy'])->name('admin.jenis-hewan.destroy'); 

    Route::get('/admin/ras-hewan', [RasHewanController::class, 'index'])->name('admin.ras-hewan.index');
    Route::get('/admin/ras-hewan/create', [RasHewanController::class, 'create'])->name('admin.ras-hewan.create');
    Route::post('/admin/ras-hewan/store', [RasHewanController::class, 'store'])->name('admin.ras-hewan.store');
    Route::get('/admin/ras-hewan/edit/{id}', [RasHewanController::class, 'edit'])->name('admin.ras-hewan.edit');
    Route::post('/admin/ras-hewan/update/{id}', [RasHewanController::class, 'update'])->name('admin.ras-hewan.update');
    Route::get('/admin/ras-hewan/delete/{id}', [RasHewanController::class, 'destroy'])->name('admin.ras-hewan.destroy');

    Route::get('/admin/pet', [PetController::class, 'index'])->name('admin.pet.index');
    Route::get('/admin/pet/create', [PetController::class, 'create'])->name('admin.pet.create');
    Route::post('/admin/pet/store', [PetController::class, 'store'])->name('admin.pet.store');
    Route::get('/admin/pet/edit/{id}', [PetController::class, 'edit'])->name('admin.pet.edit');
    Route::post('/admin/pet/update/{id}', [PetController::class, 'update'])->name('admin.pet.update');
    Route::get('/admin/pet/delete/{id}', [PetController::class, 'destroy'])->name('admin.pet.destroy');

    Route::get('/admin/pemilik', [PemilikController::class, 'index'])->name('admin.pemilik.index');
    Route::get('/admin/pemilik/create', [PemilikController::class, 'create'])->name('admin.pemilik.create');
    Route::post('/admin/pemilik/store', [PemilikController::class, 'store'])->name('admin.pemilik.store');
    Route::get('/admin/pemilik/edit/{id}', [PemilikController::class, 'edit'])->name('admin.pemilik.edit');
    Route::post('/admin/pemilik/update/{id}', [PemilikController::class, 'update'])->name('admin.pemilik.update');
    Route::get('/admin/pemilik/delete/{id}', [PemilikController::class, 'destroy'])->name('admin.pemilik.destroy');

    Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('admin.kategori.index');
    Route::get('/admin/kategori/create', [KategoriController::class, 'create'])->name('admin.kategori.create');
    Route::post('/admin/kategori/store', [KategoriController::class, 'store'])->name('admin.kategori.store');
    Route::get('/admin/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('admin.kategori.edit');
    Route::post('/admin/kategori/update/{id}', [KategoriController::class, 'update'])->name('admin.kategori.update');
    Route::get('/admin/kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('admin.kategori.destroy');

    Route::get('/admin/kategori-klinis', [KategoriKlinisController::class, 'index'])->name('admin.kategori-klinis.index');
    Route::get('/admin/kategori-klinis/create', [KategoriKlinisController::class, 'create'])->name('admin.kategori-klinis.create');
    Route::post('/admin/kategori-klinis/store', [KategoriKlinisController::class, 'store'])->name('admin.kategori-klinis.store');
    Route::get('/admin/kategori-klinis/edit/{id}', [KategoriKlinisController::class, 'edit'])->name('admin.kategori-klinis.edit');
    Route::post('/admin/kategori-klinis/update/{id}', [KategoriKlinisController::class, 'update'])->name('admin.kategori-klinis.update');
    Route::get('/admin/kategori-klinis/delete/{id}', [KategoriKlinisController::class, 'destroy'])->name('admin.kategori-klinis.destroy');

    Route::get('/admin/tindakan', [KodeTindakanTerapiController::class, 'index'])->name('admin.kode-tindakan-terapi.index');
    Route::get('/admin/tindakan/create', [KodeTindakanTerapiController::class, 'create'])->name('admin.kode-tindakan-terapi.create');
    Route::post('/admin/tindakan/store', [KodeTindakanTerapiController::class, 'store'])->name('admin.kode-tindakan-terapi.store');
    Route::get('/admin/tindakan/edit/{id}', [KodeTindakanTerapiController::class, 'edit'])->name('admin.kode-tindakan-terapi.edit');
    Route::post('/admin/tindakan/update/{id}', [KodeTindakanTerapiController::class, 'update'])->name('admin.kode-tindakan-terapi.update');
    Route::get('/admin/tindakan/delete/{id}', [KodeTindakanTerapiController::class, 'destroy'])->name('admin.kode-tindakan-terapi.destroy');

    Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('/admin/user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('/admin/user/store', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::post('/admin/user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::get('/admin/user/delete/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');

    Route::get('/admin/role', [RoleController::class, 'index'])->name('admin.role.index');
    Route::get('/admin/user-role', [UserRoleController::class, 'index'])->name('admin.user-role.index');
    Route::get('/admin/transaksi/temu-dokter', [AdminTransaksiController::class, 'indexTemu'])->name('admin.transaksi.temu');
    Route::get('/admin/transaksi/temu-dokter/delete/{id}', [AdminTransaksiController::class, 'destroyTemu'])->name('admin.transaksi.temu.destroy');
    
    Route::get('/admin/transaksi/rekam-medis', [AdminTransaksiController::class, 'indexRekam'])->name('admin.transaksi.rekam');
    Route::get('/admin/transaksi/rekam-medis/{id}', [AdminTransaksiController::class, 'showRekam'])->name('admin.transaksi.rekam.show');
    Route::get('/admin/transaksi/rekam-medis/delete/{id}', [AdminTransaksiController::class, 'destroyRekam'])->name('admin.transaksi.rekam.destroy');
});

Route::middleware(['isPemilik'])->group(function () {
    Route::get('/pemilik/dashboard', [DashboardPemilikController::class, 'index'])->name('pemilik.dashboard-pemilik');
    Route::get('/pemilik/data-pet', [DashboardPemilikController::class, 'showPet'])->name('pemilik.data-pet.data-pet');
});

Route::middleware(['isPerawat'])->group(function () {
    Route::get('/perawat/rekam-medis/{id}', [DashboardPerawatController::class, 'showRekamMedis'])->name('perawat.periksa');
    Route::get('/perawat/dashboard', [DashboardPerawatController::class, 'index'])->name('perawat.dashboard');
    Route::post('/perawat/periksa/update/{id}', [DashboardPerawatController::class, 'update'])->name('perawat.update');
    Route::get('/perawat/periksa/{id}', [App\Http\Controllers\Perawat\DashboardPerawatController::class, 'showRekamMedis'])->name('perawat.rekam-medis.periksa');
    Route::get('/perawat/dashboard', [DashboardPerawatController::class, 'index'])->name('perawat.dashboard-perawat');
    Route::get('/perawat/periksa/{id}', [DashboardPerawatController::class, 'showRekamMedis'])->name('perawat.rekam-medis.periksa');
    Route::post('/perawat/periksa/update/{id}', [DashboardPerawatController::class, 'updateRekamMedis'])->name('perawat.rekam-medis.update');
});

Route::middleware(['isDokter'])->group(function () {
    Route::get('/dokter/dashboard', [DashboardDokterController::class, 'index'])->name('dokter.dashboard-dokter');
    Route::get('/dokter/rekam-medis', [DashboardDokterController::class, 'showRekamMedisDokter'])->name('dokter.rekam-medis.rekam-medis');
});

Route::middleware(['isResepsionis'])->group(function () {
    Route::get('/resepsionis/dashboard', [App\Http\Controllers\Resepsionis\DashboardResepsionisController::class, 'index'])->name('resepsionis.dashboard-resepsionis');
    Route::get('/resepsionis/temu-dokter', [App\Http\Controllers\Resepsionis\DashboardResepsionisController::class, 'indexTemu'])->name('resepsionis.temu-dokter.index');
    Route::get('/resepsionis/pendaftaran', [App\Http\Controllers\Resepsionis\DashboardResepsionisController::class, 'indexTemu'])->name('resepsionis.pendaftaran.pendaftaran');
    Route::get('/resepsionis/temu-dokter/create', [App\Http\Controllers\Resepsionis\DashboardResepsionisController::class, 'createTemu'])->name('resepsionis.temu-dokter.create');
    Route::post('/resepsionis/temu-dokter/store', [App\Http\Controllers\Resepsionis\DashboardResepsionisController::class, 'storeTemu'])->name('resepsionis.temu-dokter.store');
    Route::get('/resepsionis/temu-dokter/edit/{id}', [App\Http\Controllers\Resepsionis\DashboardResepsionisController::class, 'editTemu'])->name('resepsionis.temu-dokter.edit');
    Route::post('/resepsionis/temu-dokter/update/{id}', [App\Http\Controllers\Resepsionis\DashboardResepsionisController::class, 'updateTemu'])->name('resepsionis.temu-dokter.update');
    Route::get('/resepsionis/temu-dokter/delete/{id}', [App\Http\Controllers\Resepsionis\DashboardResepsionisController::class, 'destroyTemu'])->name('resepsionis.temu-dokter.destroy');
    Route::get('/resepsionis/pet', [App\Http\Controllers\Admin\PetController::class, 'index'])->name('resepsionis.pet.index');
    Route::get('/resepsionis/pemilik', [App\Http\Controllers\Admin\PemilikController::class, 'index'])->name('resepsionis.pemilik.index');
    Route::get('/resepsionis/rekam-medis', [App\Http\Controllers\Resepsionis\DashboardResepsionisController::class, 'indexTemu'])->name('resepsionis.rekam-medis.index');
});