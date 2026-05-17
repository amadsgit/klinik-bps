@extends('layouts.app')

@section('content')
<div class="p-6 space-y-6">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                <i class="ph ph-user"></i> Detail Pasien
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Informasi lengkap data pasien Klinik BPS Bidan
            </p>
        </div>

        <div class="flex items-center gap-2">

            <a href="{{ route('pasien.edit', $pasien->id) }}"
                class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-amber-500 hover:bg-amber-600 text-white shadow-sm transition">
            
                <!-- ICON EDIT -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5h2m-1-1v2m-6 9l8.586-8.586a2 2 0 112.828 2.828L8.828 18H6v-2.828z" />
                </svg>
            
                Edit Pasien
            </a>
            
            <a href="{{ route('pasien.index') }}"
                class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-200 hover:bg-gray-300 text-gray-700 transition">
            
                <!-- ICON BACK -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            
                Kembali
            </a>

        </div>

    </div>


    <!-- PROFILE -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-500 rounded-3xl shadow-lg p-6 text-white">

        <div class="flex flex-col md:flex-row md:items-center gap-5">

            <!-- AVATAR -->
            <div
                class="w-20 h-20 rounded-2xl bg-white/20 flex items-center justify-center text-3xl font-bold uppercase shadow">

                {{ substr($pasien->nama, 0, 1) }}

            </div>

            <!-- INFO -->
            <div class="flex-1">

                <h2 class="text-2xl font-bold">
                    {{ $pasien->nama }}
                </h2>

                <div class="flex flex-wrap items-center gap-3 mt-2 text-sm">

                    <span class="bg-white/20 px-3 py-1 rounded-full">
                        No RM : {{ $pasien->no_rm }}
                    </span>

                    <span class="bg-white/20 px-3 py-1 rounded-full">
                        {{ $pasien->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                    </span>

                    <span class="bg-white/20 px-3 py-1 rounded-full">
                        Umur : {{ $pasien->umur }} Tahun
                    </span>

                    <span class="bg-white/20 px-3 py-1 rounded-full">
                        Status : {{ $pasien->status_pasien ?? 'Aktif' }}
                    </span>

                </div>

            </div>

        </div>

    </div>


    <!-- GRID -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        <!-- LEFT -->
        <div class="xl:col-span-2 space-y-6">

            <!-- IDENTITAS -->
            <div class="bg-white rounded-2xl shadow-sm border overflow-hidden">

                <div class="px-6 py-4 border-b bg-gray-50">
                    <h3 class="font-semibold text-gray-800">
                        Identitas Pasien
                    </h3>
                </div>

                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div>
                        <p class="text-sm text-gray-500">Nama Lengkap</p>
                        <p class="font-medium text-gray-800">
                            {{ $pasien->nama }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">NIK</p>
                        <p class="font-medium text-gray-800">
                            {{ $pasien->nik ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Tempat Lahir</p>
                        <p class="font-medium text-gray-800">
                            {{ $pasien->tempat_lahir ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Tanggal Lahir</p>
                        <p class="font-medium text-gray-800">
                            {{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->translatedFormat('d F Y') }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Jenis Kelamin</p>
                        <p class="font-medium text-gray-800">
                            {{ $pasien->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Agama</p>
                        <p class="font-medium text-gray-800">
                            {{ $pasien->agama ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Pendidikan</p>
                        <p class="font-medium text-gray-800">
                            {{ $pasien->pendidikan ?? '-' }}
                        </p>
                    </div>

                </div>

            </div>


            <!-- KONTAK -->
            <div class="bg-white rounded-2xl shadow-sm border overflow-hidden">

                <div class="px-6 py-4 border-b bg-gray-50">
                    <h3 class="font-semibold text-gray-800">
                        Kontak & Alamat
                    </h3>
                </div>

                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div>
                        <p class="text-sm text-gray-500">No HP</p>
                        <p class="font-medium text-gray-800">
                            {{ $pasien->no_hp ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">RT / RW</p>
                        <p class="font-medium text-gray-800">
                            {{ $pasien->rt ?? '-' }} / {{ $pasien->rw ?? '-' }}
                        </p>
                    </div>

                    <div class="md:col-span-2">
                        <p class="text-sm text-gray-500">Alamat</p>
                        <p class="font-medium text-gray-800 leading-relaxed">
                            {{ $pasien->alamat ?? '-' }}
                        </p>
                    </div>

                </div>

            </div>


            <!-- KELUARGA -->
            <div class="bg-white rounded-2xl shadow-sm border overflow-hidden">

                <div class="px-6 py-4 border-b bg-gray-50">
                    <h3 class="font-semibold text-gray-800">
                        Data Keluarga
                    </h3>
                </div>

                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div>
                        <p class="text-sm text-gray-500">Nama Suami</p>
                        <p class="font-medium text-gray-800">
                            {{ $pasien->nama_suami ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Pekerjaan Suami</p>
                        <p class="font-medium text-gray-800">
                            {{ $pasien->pekerjaan_suami ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Nama Ibu Kandung</p>
                        <p class="font-medium text-gray-800">
                            {{ $pasien->nama_ibu_kandung ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Kontak Darurat</p>
                        <p class="font-medium text-gray-800">
                            {{ $pasien->kontak_darurat ?? '-' }}
                        </p>
                    </div>

                </div>

            </div>

        </div>


        <!-- RIGHT -->
        <div class="space-y-6">

            <!-- MEDIS -->
            <div class="bg-white rounded-2xl shadow-sm border overflow-hidden">

                <div class="px-6 py-4 border-b bg-gray-50">
                    <h3 class="font-semibold text-gray-800">
                        Medis Dasar
                    </h3>
                </div>

                <div class="p-6 space-y-5">

                    <div>
                        <p class="text-sm text-gray-500">
                            Golongan Darah
                        </p>

                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full bg-red-100 text-red-700 font-semibold mt-1">
                            {{ $pasien->gol_darah ?? '-' }}
                        </span>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">
                            Alergi
                        </p>

                        <p class="font-medium text-gray-800 mt-1">
                            {{ $pasien->alergi ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">
                            Riwayat Penyakit
                        </p>

                        <p class="font-medium text-gray-800 leading-relaxed mt-1">
                            {{ $pasien->riwayat_penyakit ?? '-' }}
                        </p>
                    </div>

                </div>

            </div>


            <!-- ADMIN -->
            <div class="bg-white rounded-2xl shadow-sm border overflow-hidden">

                <div class="px-6 py-4 border-b bg-gray-50">
                    <h3 class="font-semibold text-gray-800">
                        Administrasi
                    </h3>
                </div>

                <div class="p-6 space-y-5">

                    <div>
                        <p class="text-sm text-gray-500">
                            No BPJS
                        </p>

                        <p class="font-medium text-gray-800 mt-1">
                            {{ $pasien->no_bpjs ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">
                            Status Pasien
                        </p>

                        <div class="mt-1">
                            @if($pasien->status_pasien == 'Aktif')
                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">
                                Aktif
                            </span>
                            @else
                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm font-semibold">
                                Nonaktif
                            </span>
                            @endif
                        </div>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">
                            Tanggal Dibuat
                        </p>

                        <p class="font-medium text-gray-800 mt-1">
                            {{ $pasien->created_at->translatedFormat('d F Y H:i') }}
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
@endsection