<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

class LaporanController extends Controller
{
    public function masuk(Request $request)
    {
        $bln = $request->input('monthPicker') ?? '2025-01';
        return view('dashboard.laporan.masuk', [
            'title' => 'Laporan Barang Masuk',
            'bln' => $bln,
            'barangmasuk' => BarangMasuk::join('barang', 'barang_masuk.id_barang', '=', 'barang.id')
                    ->select(
                        'barang_masuk.*',
                        'barang.nama',
                        'barang.satuan'
                    )
                    ->whereMonth('barang_masuk.updated_at', '=', date('m', strtotime($bln)))
                    ->whereYear('barang_masuk.updated_at', '=', date('Y', strtotime($bln)))
                    ->orderBy('barang_masuk.updated_at', 'desc')
                    ->get(),
        ]);
    }

    public function masuk_print($bln) {

        $masuk = BarangMasuk::join('barang', 'barang_masuk.id_barang', '=', 'barang.id')
                    ->select(
                        'barang_masuk.*',
                        'barang.nama',
                        'barang.satuan'
                    )
                    ->whereMonth('barang_masuk.updated_at', '=', date('m', strtotime($bln)))
                    ->whereYear('barang_masuk.updated_at', '=', date('Y', strtotime($bln)))
                    ->orderBy('barang_masuk.updated_at', 'desc')
                    ->get();

        $pdf = PDF::loadView('dashboard.laporan.masuk_print', ['barang_masuk' => $masuk, 'bln' => $bln]);
        $pdf->setPaper('A4', 'portrait');
        $a = Carbon::parse($bln)->format('m-Y');

        return $pdf->download('Laporan-Barang Masuk-'. $a .'.pdf');
    }

    public function keluar(Request $request)
    {
        $bln = $request->input('monthPicker') ?? '0';
        return view('dashboard.laporan.keluar', [
            'title' => 'Laporan Barang Keluar',
            'bln' => $bln,
            'barangkeluar' => BarangKeluar::join('barang', 'barang_keluar.id_barang', '=', 'barang.id')
                    ->select(
                        'barang_keluar.*',
                        'barang.nama',
                        'barang.satuan'
                    )
                    ->whereMonth('barang_keluar.updated_at', '=', date('m', strtotime($bln)))
                    ->whereYear('barang_keluar.updated_at', '=', date('Y', strtotime($bln)))
                    ->orderBy('barang_keluar.updated_at', 'desc')
                    ->get(),
        ]);
    }

    public function keluar_print($bln) {

        $keluar = BarangKeluar::join('barang', 'barang_keluar.id_barang', '=', 'barang.id')
                    ->select(
                        'barang_keluar.*',
                        'barang.nama',
                        'barang.satuan'
                    )
                    ->whereMonth('barang_keluar.updated_at', '=', date('m', strtotime($bln)))
                    ->whereYear('barang_keluar.updated_at', '=', date('Y', strtotime($bln)))
                    ->orderBy('barang_keluar.updated_at', 'desc')
                    ->get();

        $pdf = PDF::loadView('dashboard.laporan.keluar_print', ['barang_keluar' => $keluar, 'bln' => $bln]);
        $pdf->setPaper('A4', 'portrait');
        $a = Carbon::parse($bln)->format('m-Y');

        return $pdf->download('Laporan-Barang Keluar-'. $a .'.pdf');
    }
}
