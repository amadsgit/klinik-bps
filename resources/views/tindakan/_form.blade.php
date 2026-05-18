@csrf

<div class="space-y-6">

    <!-- DATA TINDAKAN -->
    <div class="bg-white border rounded-2xl shadow-sm p-5">

        <h3 class="text-lg font-semibold mb-4 text-gray-800">
            Data Tindakan
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- NAMA TINDAKAN -->
            <div class="md:col-span-2">

                <label class="block text-sm font-medium">
                    Nama Tindakan <span class="text-red-500">*</span>
                </label>

                <input type="text" name="nama_tindakan"
                    value="{{ old('nama_tindakan', $tindakan->nama_tindakan ?? '') }}"
                    class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-200" required>

            </div>

            <!-- TARIF -->
            <div>

                <label class="block text-sm font-medium">
                    Tarif <span class="text-red-500">*</span>
                </label>

                <input type="number" name="tarif" min="0" value="{{ old('tarif', $tindakan->tarif ?? 0) }}"
                    class="w-full border px-3 py-2 rounded-lg" required>

            </div>

            <!-- KETERANGAN -->
            <div>

                <label class="block text-sm font-medium">
                    Keterangan
                </label>

                <input type="text" name="keterangan" value="{{ old('keterangan', $tindakan->keterangan ?? '') }}"
                    class="w-full border px-3 py-2 rounded-lg">

            </div>

        </div>

    </div>

</div>

<!-- BUTTON -->
<div class="flex justify-end gap-2 mt-6">

    <!-- BATAL -->
    <a href="{{ route('tindakan.index') }}"
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