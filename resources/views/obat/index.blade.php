@extends('layouts.app')
@section('title','Data Obat')

@section('content')
<div class="p-6">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6 gap-4">
        <div>
            <h1 class="font-bold text-emerald-700">
                <i class="ph ph-pill"></i> Data Obat
            </h1>

            <p class="text-sm text-gray-500">
                Manajemen data obat klinik
            </p>
        </div>

        <a href="{{ route('obat.create') }}"
            class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-xl shadow hover:bg-blue-700 transition">

            <i class="ph ph-plus"></i>

            Tambah Obat
        </a>
    </div>

    <!-- SEARCH -->
    <form method="GET" class="mb-5">

        <div class="relative w-full md:w-1/3">

            <i class="ph ph-magnifying-glass absolute left-3 top-2.5 text-gray-400"></i>

            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama obat / satuan..."
                class="w-full pl-10 pr-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-200 focus:outline-none">

        </div>

    </form>

    <!-- TABLE -->
    <div class="bg-white shadow-lg rounded-md overflow-hidden">

        <table class="w-full text-sm">

            <thead class="bg-blue-100 text-blue-600">

                <tr>
                    <th class="px-4 py-3 text-left w-12">No</th>
                    <th class="px-4 py-3 text-left">Nama Obat</th>
                    <th class="px-4 py-3 text-left">Stok</th>
                    <th class="px-4 py-3 text-left">Harga Beli</th>
                    <th class="px-4 py-3 text-left">Harga Jual</th>
                    <th class="px-4 py-3 text-left">Kadaluarsa</th>
                    <th class="px-4 py-3 text-left w-40">Aksi</th>
                </tr>

            </thead>

            <tbody class="divide-y">

                @forelse($obat as $o)
                <tr class="hover:bg-blue-50/40 transition">

                    <!-- NOMOR -->
                    <td class="px-4 py-3 text-gray-500">
                        {{ ($obat->currentPage() - 1) * $obat->perPage() + $loop->iteration }}
                    </td>

                    <!-- NAMA -->
                    <td class="px-4 py-3 font-medium text-gray-800">
                        {{ $o->nama_obat }}

                        <div class="text-xs text-gray-400 mt-1">
                            {{ $o->satuan }}
                        </div>
                    </td>

                    <!-- STOK -->
                    <td class="px-4 py-3">

                        @if($o->stok <= 0) <span
                            class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-600 font-semibold">
                            Habis
                            </span>

                            @elseif($o->stok <= $o->stok_minimum)
                                <span
                                    class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700 font-semibold">
                                    Minimum ({{ $o->stok }})
                                </span>

                                @else
                                <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700 font-semibold">
                                    {{ $o->stok }}
                                </span>
                                @endif

                    </td>

                    <!-- HARGA BELI -->
                    <td class="px-4 py-3 text-gray-600 text-right">
                        Rp {{ number_format($o->harga_beli ?? 0, 0, ',', '.') }}
                    </td>

                    <!-- HARGA JUAL -->
                    <td class="px-4 py-3 text-gray-600 text-right">
                        Rp {{ number_format($o->harga_jual ?? 0, 0, ',', '.') }}
                    </td>

                    <!-- KADALUARSA -->
                    <td class="px-4 py-3 text-gray-600">

                        @if($o->tanggal_kadaluarsa)

                        {{ \Carbon\Carbon::parse($o->tanggal_kadaluarsa)->translatedFormat('d F Y') }}
                        @else
                        -
                        @endif

                    </td>

                    <!-- AKSI -->
                    <td class="px-4 py-3">

                        <div class="flex gap-2">

                            <!-- DETAIL -->
                            <a href="{{ route('obat.show', $o->id) }}"
                                class="inline-flex items-center border-2 gap-1 px-3 py-1 text-xs bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 transition">

                                <i class="ph ph-eye text-sm"></i>

                            </a>

                            <!-- EDIT -->
                            <a href="{{ route('obat.edit', $o->id) }}"
                                class="inline-flex items-center border-2 gap-1 px-3 py-1 text-xs bg-yellow-100 text-yellow-700 rounded-lg hover:bg-yellow-200 transition">

                                <i class="ph ph-pencil text-sm"></i>

                            </a>

                            </form>
                            <!-- DELETE -->
                            <form id="delete-form-{{ $o->id }}" action="{{ route('obat.destroy', $o->id) }}" method="POST">
                            
                                @csrf
                                @method('DELETE')
                            
                                <button type="button" onclick="confirmDelete({{ $o->id }})"
                                    class="inline-flex items-center border-2 gap-1 px-3 py-1 text-xs bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition">
                            
                                    <i class="ph ph-trash text-sm"></i>
                            
                                </button>
                            
                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="7" class="text-center py-6 text-gray-400">
                        Tidak ada data obat
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <!-- PAGINATION -->
    <div class="mt-6">
        {{ $obat->links() }}
    </div>

</div>
@endsection