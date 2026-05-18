@extends('layouts.app')

@section('content')
<div class="p-6 space-y-6">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>

            <h1 class="text-2xl font-bold text-gray-800">
                <i class="ph ph-pill"></i> Detail Obat
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Informasi lengkap data obat Klinik BPS Bidan
            </p>

        </div>

        <div class="flex items-center gap-2">

            <!-- EDIT -->
            <a href="{{ route('obat.edit', $obat->id) }}"
                class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-amber-500 hover:bg-amber-600 text-white shadow-sm transition">

                <i class="ph ph-pencil-simple text-lg"></i>

                Edit Obat
            </a>

            <!-- KEMBALI -->
            <a href="{{ route('obat.index') }}"
                class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-200 hover:bg-gray-300 text-gray-700 transition">

                <i class="ph ph-arrow-left text-lg"></i>

                Kembali
            </a>

        </div>

    </div>

    <!-- PROFILE -->
    <div class="bg-gradient-to-r from-blue-600 to-cyan-500 rounded-3xl shadow-lg p-6 text-white">

        <div class="flex flex-col md:flex-row md:items-center gap-5">

            <!-- ICON -->
            <div class="w-20 h-20 rounded-2xl bg-white/20 flex items-center justify-center text-4xl shadow">

                <i class="ph ph-pill"></i>

            </div>

            <!-- INFO -->
            <div class="flex-1">

                <h2 class="text-2xl font-bold">
                    {{ $obat->nama_obat }}
                </h2>

                <div class="flex flex-wrap items-center gap-3 mt-3 text-sm">

                    <!-- SATUAN -->
                    <span class="bg-white/20 px-3 py-1 rounded-full">
                        Satuan : {{ $obat->satuan }}
                    </span>

                    <!-- STOK -->
                    @if($obat->stok <= 0) <span class="bg-red-500/30 px-3 py-1 rounded-full">
                        Stok Habis
                        </span>

                        @elseif($obat->stok <= $obat->stok_minimum)

                            <span class="bg-yellow-400/30 px-3 py-1 rounded-full">
                                Stok Minimum : {{ $obat->stok }}
                            </span>

                            @else

                            <span class="bg-green-500/30 px-3 py-1 rounded-full">
                                Stok : {{ $obat->stok }}
                            </span>

                            @endif

                </div>

            </div>

        </div>

    </div>

    <!-- GRID -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        <!-- LEFT -->
        <div class="xl:col-span-2 space-y-6">

            <!-- DATA OBAT -->
            <div class="bg-white rounded-2xl shadow-sm border overflow-hidden">

                <div class="px-6 py-4 border-b bg-gray-50">

                    <h3 class="font-semibold text-gray-800">
                        Informasi Obat
                    </h3>

                </div>

                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">

                    <!-- NAMA -->
                    <div>

                        <p class="text-sm text-gray-500">
                            Nama Obat
                        </p>

                        <p class="font-medium text-gray-800">
                            {{ $obat->nama_obat }}
                        </p>

                    </div>

                    <!-- SATUAN -->
                    <div>

                        <p class="text-sm text-gray-500">
                            Satuan
                        </p>

                        <p class="font-medium text-gray-800">
                            {{ $obat->satuan }}
                        </p>

                    </div>

                    <!-- STOK -->
                    <div>

                        <p class="text-sm text-gray-500">
                            Stok Saat Ini
                        </p>

                        <p class="font-medium text-gray-800">
                            {{ $obat->stok }}
                        </p>

                    </div>

                    <!-- STOK MINIMUM -->
                    <div>

                        <p class="text-sm text-gray-500">
                            Stok Minimum
                        </p>

                        <p class="font-medium text-gray-800">
                            {{ $obat->stok_minimum ?? 0 }}
                        </p>

                    </div>

                    <!-- EXPIRED -->
                    <div>

                        <p class="text-sm text-gray-500">
                            Tanggal Kadaluarsa
                        </p>

                        <p class="font-medium text-gray-800">

                            @if($obat->tanggal_kadaluarsa)

                            {{ \Carbon\Carbon::parse($obat->tanggal_kadaluarsa)->locale('id')->translatedFormat('d F Y') }}

                            @else

                            -

                            @endif

                        </p>

                    </div>

                </div>

            </div>

            <!-- HARGA -->
            <div class="bg-white rounded-2xl shadow-sm border overflow-hidden">

                <div class="px-6 py-4 border-b bg-gray-50">

                    <h3 class="font-semibold text-gray-800">
                        Informasi Harga
                    </h3>

                </div>

                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">

                    <!-- HARGA BELI -->
                    <div>

                        <p class="text-sm text-gray-500">
                            Harga Beli
                        </p>

                        <p class="font-semibold text-blue-700 text-lg mt-1">
                            Rp {{ number_format($obat->harga_beli ?? 0, 0, ',', '.') }}
                        </p>

                    </div>

                    <!-- HARGA JUAL -->
                    <div>

                        <p class="text-sm text-gray-500">
                            Harga Jual
                        </p>

                        <p class="font-semibold text-green-700 text-lg mt-1">
                            Rp {{ number_format($obat->harga_jual ?? 0, 0, ',', '.') }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="space-y-6">

            <!-- STATUS -->
            <div class="bg-white rounded-2xl shadow-sm border overflow-hidden">

                <div class="px-6 py-4 border-b bg-gray-50">

                    <h3 class="font-semibold text-gray-800">
                        Status Obat
                    </h3>

                </div>

                <div class="p-6 space-y-5">

                    <!-- STATUS STOK -->
                    <div>

                        <p class="text-sm text-gray-500">
                            Kondisi Stok
                        </p>

                        <div class="mt-2">

                            @if($obat->stok <= 0) <span
                                class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm font-semibold">
                                Stok Habis
                                </span>

                                @elseif($obat->stok <= $obat->stok_minimum)

                                    <span
                                        class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm font-semibold">
                                        Stok Minimum
                                    </span>

                                    @else

                                    <span
                                        class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">
                                        Stok Aman
                                    </span>

                                    @endif

                        </div>

                    </div>

                    <!-- STATUS KADALUARSA -->
                    <div>

                        <p class="text-sm text-gray-500">
                            Status Kadaluarsa
                        </p>

                        <div class="mt-2">

                            @php
                            $expired = $obat->tanggal_kadaluarsa
                            ? \Carbon\Carbon::parse($obat->tanggal_kadaluarsa)
                            : null;
                            @endphp

                            @if(!$expired)

                            <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-sm font-semibold">
                                Tidak Ada Tanggal
                            </span>

                            @elseif($expired->isPast())

                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm font-semibold">
                                Kadaluarsa
                            </span>

                            @elseif(now()->diffInDays($expired, false) <= 30) <span
                                class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm font-semibold">
                                Hampir Kadaluarsa
                                </span>

                                @else

                                <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">
                                    Masih Aman
                                </span>

                                @endif

                        </div>

                    </div>

                    <!-- TANGGAL DIBUAT -->
                    <div>

                        <p class="text-sm text-gray-500">
                            Tanggal Dibuat
                        </p>

                        <p class="font-medium text-gray-800 mt-1">
                            {{ $obat->created_at->locale('id')->translatedFormat('d F Y H:i') }}
                        </p>

                    </div>

                    <!-- TERAKHIR UPDATE -->
                    <div>

                        <p class="text-sm text-gray-500">
                            Terakhir Diupdate
                        </p>

                        <p class="font-medium text-gray-800 mt-1">
                            {{ $obat->updated_at->locale('id')->translatedFormat('d F Y H:i') }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
@endsection