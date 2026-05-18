@extends('layouts.app')
@section('title','Data Role')

@section('content')
<div class="p-6">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6 gap-4">

        <div>
            <h1 class="font-bold text-gray-800">
                <i class="ph ph-user-gear"></i> Data Role
            </h1>

            <p class="text-sm text-gray-500">
                Manajemen role user sistem klinik BPS
            </p>
        </div>

        <a href="{{ route('role.create') }}"
            class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-xl shadow hover:bg-blue-700 transition">

            <i class="ph ph-plus"></i>
            Tambah Role
        </a>

    </div>

    <!-- SEARCH -->
    <form method="GET" class="mb-5">

        <div class="relative w-full md:w-1/3">

            <i class="ph ph-magnifying-glass absolute left-3 top-2.5 text-gray-400"></i>

            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama role..."
                class="w-full pl-10 pr-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-200 focus:outline-none">

        </div>

    </form>

    <!-- TABLE -->
    <div class="bg-white shadow-lg rounded-md overflow-hidden">

        <table class="w-full text-sm">

            <thead class="bg-sky-100 text-blue-600">

                <tr>
                    <th class="px-4 py-3 text-left w-12">No</th>
                    <th class="px-4 py-3 text-left">Nama Role</th>
                    <th class="px-4 py-3 text-left">Deskripsi</th>
                    <th class="px-4 py-3 text-left w-40">Aksi</th>
                </tr>

            </thead>

            <tbody class="divide-y">

                @forelse($role as $r)
                <tr class="hover:bg-blue-50/40 transition">

                    <!-- NO -->
                    <td class="px-4 py-3 text-gray-500">
                        {{ ($role->currentPage() - 1) * $role->perPage() + $loop->iteration }}
                    </td>

                    <!-- NAMA -->
                    <td class="px-4 py-3 font-medium text-gray-800">
                        {{ $r->nama }}
                    </td>

                    <!-- DESKRIPSI -->
                    <td class="px-4 py-3 text-gray-600">
                        {{ $r->deskripsi ?? '-' }}
                    </td>

                    <!-- AKSI -->
                    <td class="px-4 py-3">

                        <div class="flex gap-2">

                            <!-- EDIT -->
                            <a href="{{ route('role.edit', $r->id) }}"
                                class="inline-flex items-center border-2 gap-1 px-3 py-1 text-xs bg-yellow-100 text-yellow-700 rounded-lg hover:bg-yellow-200 transition">

                                <i class="ph ph-pencil text-sm"></i>

                            </a>

                            <!-- DELETE -->
                            <form id="delete-form-{{ $r->id }}" action="{{ route('role.destroy', $r->id) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="button" onclick="confirmDelete({{ $r->id }})"
                                    class="inline-flex items-center border-2 gap-1 px-3 py-1 text-xs bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition">

                                    <i class="ph ph-trash text-sm"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="4" class="text-center py-6 text-gray-400">
                        Tidak ada data role
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <!-- PAGINATION -->
    <div class="mt-6">
        {{ $role->links() }}
    </div>

</div>
@endsection