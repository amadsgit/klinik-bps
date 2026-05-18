@csrf

<div class="space-y-6">

    <!-- DATA DIAGNOSA -->
    <div class="bg-white border rounded-2xl shadow-sm p-5">

        <h3 class="text-lg font-semibold mb-4 text-gray-800">
            Data Diagnosa (ICD)
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- KODE ICD -->
            <div>

                <label class="block text-sm font-medium">
                    Kode ICD <span class="text-red-500">*</span>
                </label>

                <input type="text" name="kode_icd" value="{{ old('kode_icd', $diagnosa->kode_icd ?? '') }}"
                    class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-200"
                    placeholder="Contoh: O80, Z34, P07" required>

            </div>

            <!-- NAMA DIAGNOSA -->
            <div>

                <label class="block text-sm font-medium">
                    Nama Diagnosa <span class="text-red-500">*</span>
                </label>

                <input type="text" name="nama_diagnosa"
                    value="{{ old('nama_diagnosa', $diagnosa->nama_diagnosa ?? '') }}"
                    class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-200" required>

            </div>

            <!-- DESKRIPSI -->
            <div class="md:col-span-2">

                <label class="block text-sm font-medium">
                    Deskripsi
                </label>

                <textarea name="deskripsi" rows="3"
                    class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-200">{{ old('deskripsi', $diagnosa->deskripsi ?? '') }}</textarea>

            </div>

        </div>

    </div>

</div>

<!-- BUTTON -->
<div class="flex justify-end gap-2 mt-6">

    <!-- BATAL -->
    <a href="{{ route('diagnosa.index') }}"
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