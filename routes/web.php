<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangMasukController;

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

Route::middleware(['admin'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/master/barang', [BarangController::class, 'index'])->name('admin.barang.index');
    Route::post('/admin/master/barang', [BarangController::class, 'store'])->name('admin.barang.store');
    Route::put('/admin/master/barang/{id}', [BarangController::class, 'update'])->name('admin.barang.update');
    Route::delete('/admin/master/barang/{id}', [BarangController::class, 'destroy'])->name('admin.barang.destroy');

    Route::get('/admin/barang/masuk', [BarangMasukController::class, 'index'])->name('admin.barang.masuk.index');
    Route::post('/admin/barang/masuk', [BarangMasukController::class, 'store'])->name('admin.barang.masuk.store');
    Route::put('/admin/barang/masuk/{id}', [BarangMasukController::class, 'update'])->name('admin.barang.masuk.update');
    Route::delete('/admin/barang/masuk/{id}', [BarangMasukController::class, 'destroy'])->name('admin.barang.masuk.destroy');
});
