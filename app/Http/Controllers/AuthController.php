<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        $timestamp = strtotime(now());
        $month = date('n', $timestamp);
        return view('auth.login', [
            'title' => 'MINIMARKET IWEL | Login'
        ]);
    }

    public function generate()
    {
        $validated['username'] = 'admin';
        $validated['password'] = bcrypt('admin');
        $validated['nama'] = 'Edward Sarden';
        $validated['is_operator'] = 1;
        $validated['is_admin'] = 1;

        User::create($validated);

        return redirect()->route('welcome')->with('toast_success', 'Admin berhasil ditambah!');
    }

    public function authenticate(Request $request) {
        if($request->username == null) {
            return back()->with('toast_error', 'Username tidak boleh kosong!');
        }

        if($request->password == null) {
            return back()->with('toast_error', 'Password tidak boleh kosong!');
        }

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard')->with('toast_success', 'Selamat Datang '.ucfirst(auth()->user()->nama));
        }

        return back()->with('toast_error', 'Login Gagal, Username atau Password salah!');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('welcome');
    }
}
