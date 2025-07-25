<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;

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

Route::get('/', [AuthController::class, 'index'])->name('welcome')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth')->middleware('guest');
Route::post('/generate', [AuthController::class, 'generate'])->name('generateadmin')->middleware(['guest', 'checkadmin']);

Route::middleware(['operator'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/master/user', [UserController::class, 'index'])->name('admin.user.index');
    Route::post('/admin/master/user', [UserController::class, 'store'])->name('admin.user.store');
    Route::put('/admin/master/user/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('/admin/master/user/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');

    Route::get('/admin/master/supplier', [SupplierController::class, 'index'])->name('admin.supplier.index');
    Route::post('/admin/master/supplier', [SupplierController::class, 'store'])->name('admin.supplier.store');
    Route::put('/admin/master/supplier/{id}', [SupplierController::class, 'update'])->name('admin.supplier.update');
    Route::delete('/admin/master/supplier/{id}', [SupplierController::class, 'destroy'])->name('admin.supplier.destroy');

    Route::get('/admin/master/barang', [BarangController::class, 'index'])->name('admin.barang.index');
    Route::post('/admin/master/barang', [BarangController::class, 'store'])->name('admin.barang.store');
    Route::put('/admin/master/barang/{id}', [BarangController::class, 'update'])->name('admin.barang.update');
    Route::delete('/admin/master/barang/{id}', [BarangController::class, 'destroy'])->name('admin.barang.destroy');

    Route::get('/admin/barang/masuk', [BarangMasukController::class, 'index'])->name('admin.barang.masuk.index');
    Route::post('/admin/barang/masuk', [BarangMasukController::class, 'store'])->name('admin.barang.masuk.store');
    Route::put('/admin/barang/masuk/{id}', [BarangMasukController::class, 'update'])->name('admin.barang.masuk.update');
    Route::delete('/admin/barang/masuk/{id}', [BarangMasukController::class, 'destroy'])->name('admin.barang.masuk.destroy');

    Route::get('/admin/barang/keluar', [BarangKeluarController::class, 'index'])->name('admin.barang.keluar.index');
    Route::post('/admin/barang/keluar', [BarangKeluarController::class, 'store'])->name('admin.barang.keluar.store');
    Route::put('/admin/barang/keluar/{id}', [BarangKeluarController::class, 'update'])->name('admin.barang.keluar.update');
    Route::delete('/admin/barang/keluar/{id}', [BarangKeluarController::class, 'destroy'])->name('admin.barang.keluar.destroy');

    Route::get('/admin/laporan/stok', [LaporanController::class, 'stok'])->name('admin.laporan.stok');
    Route::get('/admin/laporan/stok/print/{bln}', [LaporanController::class, 'stok_print'])->name('admin.laporan.stok.print');
    Route::get('/admin/laporan/masuk', [LaporanController::class, 'masuk'])->name('admin.laporan.masuk');
    Route::get('/admin/laporan/masuk/print/{bln}', [LaporanController::class, 'masuk_print'])->name('admin.laporan.masuk.print');
    Route::get('/admin/laporan/keluar', [LaporanController::class, 'keluar'])->name('admin.laporan.keluar');
    Route::get('/admin/laporan/keluar/print/{bln}', [LaporanController::class, 'keluar_print'])->name('admin.laporan.keluar.print');
});
