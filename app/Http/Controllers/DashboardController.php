<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard Admin',
            'total_barang' => Barang::count(),
            'total_barang_masuk' => BarangMasuk::count(),
            'total_barang_keluar' => BarangKeluar::count(),
        ]);
    }
}
