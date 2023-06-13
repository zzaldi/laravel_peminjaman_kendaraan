<?php

namespace App\Http\Controllers;

class AdminDashboardController extends Controller
{
    // Tampilkan halaman dashboard admin
    public function index()
    {
        return view('admin.dashboard');
    }
}