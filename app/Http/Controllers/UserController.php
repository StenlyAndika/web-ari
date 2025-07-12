<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Satuan;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.user.index', [
            'title' => 'Data User',
            'user' => User::all(),
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'username' => 'required|unique:user,username',
            'password' => 'required'
        ];

        $validatedData = $request->validate($rules);
        $validatedData['password'] = bcrypt($request->password);
        $validatedData['is_operator'] = 1;
        $validatedData['is_admin'] = 0;

        User::create($validatedData);

        return redirect()->route('admin.user.index')->with('toast_success', 'Data berhasil ditambah!');
    }

    public function update(Request $request, string $id)
    {
        $rules = [
            'nama' => 'required',
            'username' => 'required'
        ];

        $validatedData = $request->validate($rules);
        if ($request->password) {
            $validatedData['password'] = bcrypt($request->password);
        }

        User::where('id', $id)->update($validatedData);

        return redirect()->route('admin.user.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('admin.user.index')->with('toast_success', 'Data berhasil dihapus!');
    }
}
