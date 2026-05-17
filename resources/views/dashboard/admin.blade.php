@extends('layouts.app')
@section('title','Dashboard Admin')

@section('content')

<div class="space-y-6">

    <!-- GREETING -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
        <div>
            <h2 class="text-lg font-semibold text-gray-800">
                Halo, {{ Auth::user()->name }} 👋
            </h2>
            <p class="text-sm text-gray-500">
                Ringkasan aktivitas klinik hari ini
            </p>
        </div>
    </div>

    <!-- STATS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

        <!-- PASIEN -->
        <div class="bg-white rounded-2xl shadow-sm border p-5 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Pasien</p>
                    <h2 class="text-2xl font-bold text-gray-800 mt-1">
                        {{ $totalPasien }}
                    </h2>
                </div>
                <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-blue-100 text-blue-600">
                    <i class="ph ph-users text-xl"></i>
                </div>
            </div>
        </div>

        <!-- KUNJUNGAN -->
        <div class="bg-white rounded-2xl shadow-sm border p-5 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Kunjungan Hari Ini</p>
                    <h2 class="text-2xl font-bold text-gray-800 mt-1">
                        {{ $kunjunganHariIni }}
                    </h2>
                </div>
                <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">
                    <i class="ph ph-calendar-check text-xl"></i>
                </div>
            </div>
        </div>

        <!-- BAYI -->
        <div class="bg-white rounded-2xl shadow-sm border p-5 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Bayi</p>
                    <h2 class="text-2xl font-bold text-gray-800 mt-1">
                        {{ $totalBayi }}
                    </h2>
                </div>
                <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-pink-100 text-pink-600">
                    <i class="ph ph-baby text-xl"></i>
                </div>
            </div>
        </div>

        <!-- TRANSAKSI -->
        <div class="bg-white rounded-2xl shadow-sm border p-5 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Transaksi</p>
                    <h2 class="text-2xl font-bold text-gray-800 mt-1">
                        Rp {{ number_format($totalTransaksi) }}
                    </h2>
                </div>
                <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-yellow-100 text-yellow-600">
                    <i class="ph ph-currency-circle-dollar text-xl"></i>
                </div>
            </div>
        </div>

    </div>

    <!-- GRID BAWAH -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        <!-- ACTIVITY / INFO -->
        <div class="xl:col-span-2 bg-white rounded-2xl shadow-sm border p-5">
            <h3 class="text-sm font-semibold text-gray-700 mb-4">
                Aktivitas Hari Ini
            </h3>

            <div class="space-y-3 text-sm text-gray-600">
                <p>• Total kunjungan hari ini: <span class="font-semibold">{{ $kunjunganHariIni }}</span></p>
                <p>• Total pasien terdaftar: <span class="font-semibold">{{ $totalPasien }}</span></p>
                <p>• Total bayi: <span class="font-semibold">{{ $totalBayi }}</span></p>
            </div>
        </div>

        <!-- QUICK ACTION -->
        <div class="bg-white rounded-2xl shadow-sm border p-5">
            <h3 class="text-sm font-semibold text-gray-700 mb-4">
                Aksi Cepat
            </h3>

            <div class="space-y-3">

                <a href="#"
                    class="block w-full text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                    + Tambah Pasien
                </a>

                <a href="#"
                    class="block w-full text-center bg-emerald-600 text-white py-2 rounded-lg hover:bg-emerald-700 transition">
                    + Kunjungan Baru
                </a>

            </div>
        </div>

    </div>

</div>

@endsection