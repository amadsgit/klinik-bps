<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pasien;
use App\Models\Kunjungan;
use App\Models\Bayi;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role->nama;

        // Data umum
        $totalPasien = Pasien::count();
        $kunjunganHariIni = Kunjungan::whereDate('tanggal', now())->count();

        if ($role === 'admin') {

            $totalBayi = Bayi::count();
            $totalTransaksi = Transaksi::sum('total');

            return view('dashboard.admin', compact(
                'totalPasien',
                'kunjunganHariIni',
                'totalBayi',
                'totalTransaksi'
            ));
        }

        if ($role === 'bidan') {

            $antrian = Kunjungan::where('status', 'menunggu')->count();
            $proses = Kunjungan::where('status', 'proses')->count();

            return view('dashboard.bidan', compact(
                'totalPasien',
                'kunjunganHariIni',
                'antrian',
                'proses'
            ));
        }

        return abort(403);
    }
}