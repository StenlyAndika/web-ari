<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Satuan;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        return view('dashboard.barang.index', [
            'title' => 'Data Barang',
            'barang' => Barang::orderBy('updated_at', 'desc')->get(),
            'satuan' => Satuan::getall(),
        ]);
    }

    public function store(Request $request)
    {
        $request->merge([
            'harga' => str_replace(['Rp.', '.', ' '], '', $request->harga),
        ]);

        $rules = [
            'nama' => 'required',
            'satuan' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ];

        $validatedData = $request->validate($rules);

        Barang::create($validatedData);

        return redirect()->route('admin.barang.index')->with('toast_success', 'Data berhasil ditambah!');
    }

    public function update(Request $request, string $id)
    {
        $request->merge([
            'harga' => str_replace(['Rp.', '.', ' '], '', $request->harga),
        ]);

        $rules = [
            'nama' => 'required',
            'satuan' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ];

        $validatedData = $request->validate($rules);

        Barang::where('id', $id)->update($validatedData);

        return redirect()->route('admin.barang.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        Barang::where('id', $id)->delete();
        return redirect()->route('admin.barang.index')->with('toast_success', 'Data berhasil dihapus!');
    }
}
