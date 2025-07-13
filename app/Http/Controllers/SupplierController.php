<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use App\Models\Satuan;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        return view('dashboard.supplier.index', [
            'title' => 'Data Supplier',
            'supplier' => Supplier::orderBy('nama', 'asc')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Supplier::create($validatedData);

        return redirect()->route('admin.supplier.index')->with('toast_success', 'Data berhasil ditambah!');
    }

    public function update(Request $request, string $id)
    {
        $rules = [
            'nama' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Supplier::where('id', $id)->update($validatedData);

        return redirect()->route('admin.supplier.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        Supplier::where('id', $id)->delete();
        return redirect()->route('admin.supplier.index')->with('toast_success', 'Data berhasil dihapus!');
    }
}
