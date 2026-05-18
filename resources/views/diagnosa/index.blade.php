@extends('layouts.app')
@section('title','Data Diagnosa')

@section('content')
<div class="p-6">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6 gap-4">

        <div>
            <h1 class="font-bold text-pink-700">
                <i class="ph ph-heartbeat"></i> Data Diagnosa
            </h1>

            <p class="text-sm text-gray-500">
                Manajemen data diagnosa ICD klinik bidan
            </p>
        </div>

        <a href="{{ route('diagnosa.create') }}"
            class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-xl shadow hover:bg-blue-700 transition">

            <i class="ph ph-plus"></i>

            Tambah Diagnosa
        </a>

    </div>

    <!-- SEARCH -->
    <form method="GET" class="mb-5">

        <div class="relative w-full md:w-1/3">

            <i class="ph ph-magnifying-glass absolute left-3 top-2.5 text-gray-400"></i>

            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kode ICD / diagnosa..."
                class="w-full pl-10 pr-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-200 focus:outline-none">

        </div>

    </form>

    <!-- TABLE -->
    <div class="bg-white shadow-lg rounded-md overflow-hidden">

        <table class="w-full text-sm">

            <thead class="bg-blue-100 text-blue-600">

                <tr>
                    <th class="px-4 py-3 text-left w-12">No</th>
                    <th class="px-4 py-3 text-left">Kode ICD</th>
                    <th class="px-4 py-3 text-left">Nama Diagnosa</th>
                    <th class="px-4 py-3 text-left">Deskripsi</th>
                    <th class="px-4 py-3 text-left w-40">Aksi</th>
                </tr>

            </thead>

            <tbody class="divide-y">

                @forelse($diagnosa as $d)
                <tr class="hover:bg-blue-50/40 transition">

                    <!-- NOMOR -->
                    <td class="px-4 py-3 text-gray-500">
                        {{ ($diagnosa->currentPage() - 1) * $diagnosa->perPage() + $loop->iteration }}
                    </td>

                    <!-- KODE ICD -->
                    <td class="px-4 py-3 font-mono text-gray-800">
                        {{ $d->kode_icd }}
                    </td>

                    <!-- NAMA DIAGNOSA -->
                    <td class="px-4 py-3 font-medium text-gray-800">
                        {{ $d->nama_diagnosa }}
                    </td>

                    <!-- DESKRIPSI -->
                    <td class="px-4 py-3 text-gray-600">
                        {{ $d->deskripsi ?? '-' }}
                    </td>

                    <!-- AKSI -->
                    <td class="px-4 py-3">

                        <div class="flex gap-2">

                            <!-- EDIT -->
                            <a href="{{ route('diagnosa.edit', $d->id) }}"
                                class="inline-flex items-center border-2 gap-1 px-3 py-1 text-xs bg-yellow-100 text-yellow-700 rounded-lg hover:bg-yellow-200 transition">

                                <i class="ph ph-pencil text-sm"></i>

                            </a>

                            <!-- DELETE -->
                            <form id="delete-form-{{ $d->id }}" action="{{ route('diagnosa.destroy', $d->id) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="button" onclick="confirmDelete({{ $d->id }})"
                                    class="inline-flex items-center border-2 gap-1 px-3 py-1 text-xs bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition">

                                    <i class="ph ph-trash text-sm"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="5" class="text-center py-6 text-gray-400">
                        Tidak ada data diagnosa
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <!-- PAGINATION -->
    <div class="mt-6">
        {{ $diagnosa->links() }}
    </div>

</div>
@endsection