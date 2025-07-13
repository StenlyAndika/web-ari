<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Satuan;
use App\Models\Supplier;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        return view('dashboard.barang_keluar.index', [
            'title' => 'Data Barang Keluar',
            'barang' => Barang::orderBy('nama', 'asc')->get(),
            'supplier' => Supplier::orderBy('nama', 'asc')->get(),
            'satuan' => Satuan::getall(),
            'barangkeluar' => BarangKeluar::join('barang', 'barang_keluar.id_barang', '=', 'barang.id')
                    ->join('barang_masuk', 'barang_masuk.id_barang', '=', 'barang_keluar.id_barang')
                    ->join('supplier', 'barang_masuk.id_supplier', '=', 'supplier.id')
                    ->select(
                        'barang_keluar.*',
                        'barang.nama',
                        'barang.satuan',
                        'supplier.nama as nama_supplier'
                    )
                    ->get(),
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'id_barang' => 'required',
            'jumlah' => 'required',
        ];

        $validatedData = $request->validate($rules);

        //Update stok barang
        $stok = Barang::where('id', $request->id_barang)->first()->stok;
        $sisa = $stok - $request->jumlah;

        Barang::where('id', $request->id_barang)->update(['stok' => $sisa]);

        //Insert data barang keluar
        BarangKeluar::create($validatedData);

        return redirect()->route('admin.barang.keluar.index')->with('toast_success', 'Data berhasil ditambah!');
    }

    public function update(Request $request, string $id)
    {
        $rules = [
            'id_barang' => 'required',
            'jumlah' => 'required',
        ];

        $validatedData = $request->validate($rules);

        //Update stok barang
        $stok = Barang::where('id', $request->id_barang)->first()->stok;
        $sisa = $stok + $request->jumlah_old - $request->jumlah;

        Barang::where('id', $request->id_barang)->update(['stok' => $sisa]);

        //Update data barang keluar
        BarangKeluar::where('id', $id)->update($validatedData);

        return redirect()->route('admin.barang.keluar.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        $keluar = BarangKeluar::where('id', $id)->first();

        //Update stok barang
        $stok = Barang::where('id', $keluar->id_barang)->first()->stok;
        $sisa = $stok + $keluar->jumlah;
        Barang::where('id', $keluar->id_barang)->update(['stok' => $sisa]);

        BarangKeluar::where('id', $id)->delete();
        return redirect()->route('admin.barang.keluar.index')->with('toast_success', 'Data berhasil dihapus!');
    }
}
