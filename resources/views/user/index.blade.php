@extends('layouts.app')
@section('title','Data User')

@section('content')
<div class="p-6">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6 gap-4">

        <div>
            <h1 class="font-bold text-gray-800">
                <i class="ph ph-users"></i> Data User
            </h1>

            <p class="text-sm text-gray-500">
                Manajemen user sistem klinik BPS
            </p>
        </div>

        <a href="{{ route('user.create') }}"
            class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-xl shadow hover:bg-blue-700 transition">

            <i class="ph ph-user-plus"></i>
            Tambah User
        </a>

    </div>

    <!-- SEARCH -->
    <form method="GET" class="mb-5">

        <div class="relative w-full md:w-1/3">

            <i class="ph ph-magnifying-glass absolute left-3 top-2.5 text-gray-400"></i>

            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama / email user..."
                class="w-full pl-10 pr-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-200 focus:outline-none">

        </div>

    </form>

    <!-- TABLE -->
    <div class="bg-white shadow-lg rounded-md overflow-hidden">

        <table class="w-full text-sm">

            <thead class="bg-sky-100 text-blue-600">

                <tr>
                    <th class="px-4 py-3 text-left w-12">No</th>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Role</th>
                    <th class="px-4 py-3 text-left w-40">Aksi</th>
                </tr>

            </thead>

            <tbody class="divide-y">

                @forelse($users as $u)
                <tr class="hover:bg-blue-50/40 transition">

                    <!-- NO -->
                    <td class="px-4 py-3 text-gray-500">
                        {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                    </td>

                    <!-- NAMA -->
                    <td class="px-4 py-3 font-medium text-gray-800">
                        {{ $u->name }}
                    </td>

                    <!-- EMAIL -->
                    <td class="px-4 py-3 text-gray-600">
                        {{ $u->email }}
                    </td>

                    <!-- ROLE -->
                    <td class="px-4 py-3">
                        @php
                        $role = strtolower($u->role->nama ?? '-');
                        @endphp
                    
                        @if($role === 'admin')
                        <span class="px-2 py-1 text-xs rounded-lg bg-red-100 text-red-700">
                            {{ $u->role->nama ?? '-' }}
                        </span>
                    
                        @elseif($role === 'bidan')
                        <span class="px-2 py-1 text-xs rounded-lg bg-green-100 text-green-700">
                            {{ $u->role->nama ?? '-' }}
                        </span>
                    
                        @elseif($role === 'staff')
                        <span class="px-2 py-1 text-xs rounded-lg bg-purple-100 text-purple-700">
                            {{ $u->role->nama ?? '-' }}
                        </span>
                    
                        @elseif($role === 'dokter')
                        <span class="px-2 py-1 text-xs rounded-lg bg-blue-100 text-blue-700">
                            {{ $u->role->nama ?? '-' }}
                        </span>
                    
                        @else
                        <span class="px-2 py-1 text-xs rounded-lg bg-gray-100 text-gray-700">
                            {{ $u->role->nama ?? '-' }}
                        </span>
                        @endif
                    </td>

                    <!-- AKSI -->
                    <td class="px-4 py-3">

                        <div class="flex gap-2">

                            <!-- DETAIL -->
                            {{-- <a href="{{ route('user.show', $u->id) }}"
                                class="inline-flex items-center border-2 gap-1 px-3 py-1 text-xs bg-green-100 text-green-700 rounded-lg hover:bg-green-200 transition">

                                <i class="ph ph-eye text-sm"></i>
                            </a> --}}

                            <!-- EDIT -->
                            <a href="{{ route('user.edit', $u->id) }}"
                                class="inline-flex items-center border-2 gap-1 px-3 py-1 text-xs bg-yellow-100 text-yellow-700 rounded-lg hover:bg-yellow-200 transition">

                                <i class="ph ph-pencil text-sm"></i>
                            </a>

                            <!-- DELETE -->
                            <form id="delete-form-{{ $u->id }}" action="{{ route('user.destroy', $u->id) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="button" onclick="confirmDelete({{ $u->id }})"
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
                        Tidak ada data user
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <!-- PAGINATION -->
    <div class="mt-6">
        {{ $users->links() }}
    </div>

</div>
@endsection