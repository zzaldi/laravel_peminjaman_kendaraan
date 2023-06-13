<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    // Tampilkan halaman login admin
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Lakukan autentikasi admin
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // Jika autentikasi berhasil, arahkan ke halaman dashboard admin
            return redirect()->route('admin.dashboard');
        } else {
            // Jika autentikasi gagal, tampilkan pesan kesalahan
            return redirect()->back()->with('error', 'Email atau password salah');
        }
    }

    // Logout admin
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}