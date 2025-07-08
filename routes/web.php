<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

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
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});
