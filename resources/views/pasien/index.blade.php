@extends('layouts.app')
@section('title','Data Pasien')

@section('content')
<div class="p-6">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6 gap-4">
        <div>
            <h1 class=" font-bold text-gray-800"> <i class="ph ph-users"></i> Data Pasien</h1>
            <p class="text-sm text-gray-500">Manajemen data pasien klinik</p>
        </div>

        <a href="{{ route('pasien.create') }}"
            class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-xl shadow hover:bg-blue-700 transition">
            <i class="ph ph-plus"></i>
            Tambah Pasien
        </a>
    </div>

    <!-- SEARCH -->
    <form method="GET" class="mb-5">
        <div class="relative w-full md:w-1/3">
            <i class="ph ph-magnifying-glass absolute left-3 top-2.5 text-gray-400"></i>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama / No RM..."
                class="w-full pl-10 pr-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-200 focus:outline-none">
        </div>
    </form>

    <!-- TABLE -->
    <div class="bg-white shadow-lg rounded-md overflow-hidden">

        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-emerald-600">
                <tr>
                    <th class="px-4 py-3 text-left w-12">No</th>
                    <th class="px-4 py-3 text-left">No RM</th>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">NIK</th>
                    <th class="px-4 py-3 text-left">No HP</th>
                    <th class="px-4 py-3 text-left w-40">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse($pasien as $p)
                <tr class="hover:bg-blue-50/40 transition">

                    <!-- NOMOR -->
                    <td class="px-4 py-3 text-gray-500">
                        {{ ($pasien->currentPage() - 1) * $pasien->perPage() + $loop->iteration }}
                    </td>

                    <!-- NO RM -->
                    <td class="px-4 py-3">
                        <span class="px-3 py-1 text-xs font-semibold bg-blue-100 text-blue-700 rounded-full">
                            {{ $p->no_rm }}
                        </span>
                    </td>

                    <!-- NAMA -->
                    <td class="px-4 py-3 font-medium text-gray-800">
                        {{ $p->nama }}
                    </td>

                    <!-- NIK -->
                    <td class="px-4 py-3 text-gray-600">
                        {{ $p->nik ?? '-' }}
                    </td>

                    <!-- HP -->
                    <td class="px-4 py-3 text-gray-600">
                        {{ $p->no_hp ?? '-' }}
                    </td>

                    <!-- AKSI -->
                    <td class="px-4 py-3">
                        <div class="flex gap-2">

                            <!-- DETAIL -->
                            <a href="{{ route('pasien.show', $p->id) }}"
                                class="inline-flex items-center border-2 gap-1 px-3 py-1 text-xs bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 transition">
                                <i class="ph ph-eye text-sm"></i>
                            </a>

                            <!-- EDIT -->
                            <a href="{{ route('pasien.edit', $p->id) }}"
                                class="inline-flex items-center border-2 gap-1 px-3 py-1 text-xs bg-yellow-100 text-yellow-700 rounded-lg hover:bg-yellow-200 transition">
                                <i class="ph ph-pencil text-sm"></i>
                            </a>

                            <!-- DELETE -->
                            <form id="delete-form-{{ $p->id }}" action="{{ route('pasien.destroy', $p->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            
                                <button type="button" onclick="confirmDelete({{ $p->id }})"
                                    class="inline-flex items-center border-2 gap-1 px-3 py-1 text-xs bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition">
                                    <i class="ph ph-trash text-sm"></i>
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-6 text-gray-400">
                        Tidak ada data pasien
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>

    <!-- PAGINATION -->
    <div class="mt-6">
        {{ $pasien->links() }}
    </div>

</div>
@endsection