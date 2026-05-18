@csrf

<div class="space-y-6">

    <!-- DATA OBAT -->
    <div class="bg-white border rounded-2xl shadow-sm p-5">

        <h3 class="text-lg font-semibold mb-4 text-gray-800">
            Data Obat
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- NAMA OBAT -->
            <div class="md:col-span-2">

                <label class="block text-sm font-medium">
                    Nama Obat <span class="text-red-500">*</span>
                </label>

                <input type="text" name="nama_obat" value="{{ old('nama_obat', $obat->nama_obat ?? '') }}"
                    class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-200" required>

            </div>

            <!-- STOK -->
            <div>

                <label class="block text-sm font-medium">
                    Stok <span class="text-red-500">*</span>
                </label>

                <input type="number" name="stok" min="0" value="{{ old('stok', $obat->stok ?? 0) }}"
                    class="w-full border px-3 py-2 rounded-lg" required>

            </div>

            <!-- SATUAN -->
            <div>

                <label class="block text-sm font-medium">
                    Satuan <span class="text-red-500">*</span>
                </label>

                <select name="satuan" class="w-full border px-3 py-2 rounded-lg" required>

                    <option value="">-- Pilih Satuan --</option>

                    @foreach(['Tablet','Kapsul','Botol','Strip','Ampul','Tube','Sachet'] as $satuan)

                    <option value="{{ $satuan }}" {{ old('satuan', $obat->satuan ?? '') == $satuan ? 'selected' : '' }}>

                        {{ $satuan }}

                    </option>

                    @endforeach

                </select>

            </div>

        </div>

    </div>

    <!-- HARGA -->
    <div class="bg-white border rounded-2xl shadow-sm p-5">

        <h3 class="text-lg font-semibold mb-4 text-gray-800">
            Harga
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- HARGA BELI -->
            <div>

                <label class="block text-sm font-medium">
                    Harga Beli
                </label>

                <input type="number" name="harga_beli" min="0" value="{{ old('harga_beli', $obat->harga_beli ?? '') }}"
                    class="w-full border px-3 py-2 rounded-lg">

            </div>

            <!-- HARGA JUAL -->
            <div>

                <label class="block text-sm font-medium">
                    Harga Jual
                </label>

                <input type="number" name="harga_jual" min="0" value="{{ old('harga_jual', $obat->harga_jual ?? '') }}"
                    class="w-full border px-3 py-2 rounded-lg">

            </div>

        </div>

    </div>

    <!-- STOK & KADALUARSA -->
    <div class="bg-white border rounded-2xl shadow-sm p-5">

        <h3 class="text-lg font-semibold mb-4 text-gray-800">
            Stok & Kadaluarsa
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- STOK MINIMUM -->
            <div>

                <label class="block text-sm font-medium">
                    Stok Minimum
                </label>

                <input type="number" name="stok_minimum" min="0"
                    value="{{ old('stok_minimum', $obat->stok_minimum ?? 0) }}"
                    class="w-full border px-3 py-2 rounded-lg">

            </div>

            <!-- KADALUARSA -->
            <div>

                <label class="block text-sm font-medium">
                    Tanggal Kadaluarsa
                </label>

                <input type="date" name="tanggal_kadaluarsa"
                    value="{{ old('tanggal_kadaluarsa', $obat->tanggal_kadaluarsa ?? '') }}"
                    class="w-full border px-3 py-2 rounded-lg">

            </div>

        </div>

    </div>

</div>

<!-- BUTTON -->
<div class="flex justify-end gap-2 mt-6">

    <!-- BATAL -->
    <a href="{{ route('obat.index') }}"
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