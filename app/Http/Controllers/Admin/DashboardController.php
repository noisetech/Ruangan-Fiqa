<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Peminjaman;
use App\Ruangan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('pages.dashboard', [
            'ruangan' => Ruangan::count(),
            'peminjaman' => Peminjaman::count(),
            'gagal' => Peminjaman::where('status_peminjaman' , 'GAGAL')->count(),
            'sukses' => Peminjaman::where('status_peminjaman', 'SUSKES')->count(),
        ]);
    }
}
