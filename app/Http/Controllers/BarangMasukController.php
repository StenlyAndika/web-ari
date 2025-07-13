<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Satuan;
use App\Models\Supplier;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        return view('dashboard.barang_masuk.index', [
            'title' => 'Data Barang Masuk',
            'barang' => Barang::orderBy('nama', 'asc')->get(),
            'supplier' => Supplier::orderBy('nama', 'asc')->get(),
            'satuan' => Satuan::getall(),
            'barangmasuk' => BarangMasuk::join('barang', 'barang_masuk.id_barang', '=', 'barang.id')
                    ->join('supplier', 'barang_masuk.id_supplier', '=', 'supplier.id')
                    ->select(
                        'barang_masuk.*',
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
            'id_supplier' => 'required',
            'jumlah' => 'required',
        ];

        $validatedData = $request->validate($rules);

        //Update stok barang
        $stok = Barang::where('id', $request->id_barang)->first()->stok;
        $sisa = $stok + $request->jumlah;

        Barang::where('id', $request->id_barang)->update(['stok' => $sisa]);

        //Insert data barang masuk
        BarangMasuk::create($validatedData);

        return redirect()->route('admin.barang.masuk.index')->with('toast_success', 'Data berhasil ditambah!');
    }

    public function update(Request $request, string $id)
    {
        $rules = [
            'id_barang' => 'required',
            'id_supplier' => 'required',
            'jumlah' => 'required',
        ];

        $validatedData = $request->validate($rules);

        //Update stok barang
        $stok = Barang::where('id', $request->id_barang)->first()->stok;
        $sisa = $stok - $request->jumlah_old + $request->jumlah;

        Barang::where('id', $request->id_barang)->update(['stok' => $sisa]);

        //Update data barang masuk
        BarangMasuk::where('id', $id)->update($validatedData);

        return redirect()->route('admin.barang.masuk.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        $masuk = BarangMasuk::where('id', $id)->first();

        //Update stok barang
        $stok = Barang::where('id', $masuk->id_barang)->first()->stok;
        $sisa = $stok - $masuk->jumlah;
        Barang::where('id', $masuk->id_barang)->update(['stok' => $sisa]);


        BarangMasuk::where('id', $id)->delete();
        return redirect()->route('admin.barang.masuk.index')->with('toast_success', 'Data berhasil dihapus!');
    }
}
