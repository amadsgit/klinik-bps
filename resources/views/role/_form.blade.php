@csrf

<div class="space-y-6">

    <!-- DATA ROLE -->
    <div class="bg-white border rounded-2xl shadow-sm p-5">

        <h3 class="text-lg font-semibold mb-4 text-gray-800">
            Data Role
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- NAMA ROLE -->
            <div>

                <label class="block text-sm font-medium">
                    Nama Role <span class="text-red-500">*</span>
                </label>

                <input type="text" name="nama" value="{{ old('nama', $role->nama ?? '') }}"
                    class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-200"
                    placeholder="Contoh: Admin, Bidan, Apoteker" required>

                @error('nama')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror

            </div>

            <!-- DESKRIPSI -->
            <div class="md:col-span-2">

                <label class="block text-sm font-medium">
                    Deskripsi
                </label>

                <textarea name="deskripsi" rows="3"
                    class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-200"
                    placeholder="Penjelasan fungsi role...">{{ old('deskripsi', $role->deskripsi ?? '') }}</textarea>

                @error('deskripsi')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror

            </div>

        </div>

    </div>

</div>

<!-- BUTTON -->
<div class="flex justify-end gap-2 mt-6">

    <!-- BATAL -->
    <a href="{{ route('role.index') }}"
        class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition">

        <i class="ph ph-arrow-left text-lg"></i>
        Batal
    </a>

    <!-- SIMPAN -->
    <button type="submit"
        class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 shadow transition">

        <i class="ph ph-floppy-disk text-lg"></i>
        Simpan
    </button>

</div>