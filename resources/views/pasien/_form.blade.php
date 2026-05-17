@csrf

<div x-data="{
    nik: '{{ old('nik', $pasien->nik ?? '') }}',
    nikError: '',
    checkNikTimeout: null,

    checkNik() {
        clearTimeout(this.checkNikTimeout);

        if (this.nik.length !== 16) {
            this.nikError = '';
            return;
        }

        let currentId = '{{ $pasien->id ?? '' }}';

        this.checkNikTimeout = setTimeout(() => {
            fetch(`/cek-nik?nik=${this.nik}&id=${currentId}`)
                .then(res => {
                    if (!res.ok) throw new Error('Network error');
                    return res.json();
                })
                .then(data => {
                    this.nikError = data.exists ? 'NIK sudah terdaftar' : '';
                })
                .catch(() => {
                    this.nikError = 'Gagal cek NIK';
                });
        }, 500);
    }
}" class="space-y-6">

    <!-- ================= IDENTITAS PASIEN ================= -->
    <div class="bg-white border rounded-2xl shadow-sm p-5">
        <h3 class="text-lg font-semibold mb-4 text-gray-800">
            Identitas Pasien
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- NAMA -->
            <div>
                <label class="block text-sm font-medium">
                    Nama <span class="text-red-500">*</span>
                </label>

                <input type="text" name="nama" value="{{ old('nama', $pasien->nama ?? '') }}"
                    class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-200" required>
            </div>

            <!-- NIK -->
            <div>
                <label class="block text-sm font-medium">
                    NIK <span class="text-red-500">*</span>
                </label>

                <input type="text" name="nik" x-model="nik" @input="checkNik" maxlength="16" placeholder="16 digit"
                    class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-200" required>

                <p class="text-red-500 text-xs mt-1" x-show="nikError" x-text="nikError">
                </p>
            </div>

            <!-- TEMPAT LAHIR -->
            <div>
                <label class="block text-sm font-medium">
                    Tempat Lahir <span class="text-red-500">*</span>
                </label>

                <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $pasien->tempat_lahir ?? '') }}"
                    class="w-full border px-3 py-2 rounded-lg" required>
            </div>

            <!-- TANGGAL LAHIR -->
            <div>
                <label class="block text-sm font-medium">
                    Tanggal Lahir <span class="text-red-500">*</span>
                </label>
            
                <input type="date" name="tanggal_lahir"
                    value="{{ old('tanggal_lahir', isset($pasien) && $pasien->tanggal_lahir ? $pasien->tanggal_lahir->format('Y-m-d') : '') }}"
                    class="w-full border px-3 py-2 rounded-lg" required>
            </div>

            <!-- JENIS KELAMIN -->
            <div>
                <label class="block text-sm font-medium">
                    Jenis Kelamin <span class="text-red-500">*</span>
                </label>

                <select name="jenis_kelamin" class="w-full border px-3 py-2 rounded-lg" required>

                    <option value="">-- Pilih --</option>

                    <option value="L" {{ old('jenis_kelamin', $pasien->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>
                        Laki-laki
                    </option>

                    <option value="P" {{ old('jenis_kelamin', $pasien->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>
                        Perempuan
                    </option>

                </select>
            </div>

            <!-- AGAMA -->
            <div>
                <label class="block text-sm font-medium">
                    Agama
                </label>

                <select name="agama" class="w-full border px-3 py-2 rounded-lg">

                    <option value="">-- Pilih --</option>

                    @foreach(['Islam','Kristen','Katolik','Hindu','Budha','Konghucu'] as $agama)
                    <option value="{{ $agama }}" {{ old('agama', $pasien->agama ?? '') == $agama ? 'selected' : '' }}>
                        {{ $agama }}
                    </option>
                    @endforeach

                </select>
            </div>

            <!-- PENDIDIKAN -->
            <div>
                <label class="block text-sm font-medium">
                    Pendidikan
                </label>

                <select name="pendidikan" class="w-full border px-3 py-2 rounded-lg">

                    <option value="">-- Pilih --</option>

                    @foreach(['Tidak Sekolah','SD','SMP','SMA','D3','S1','S2'] as $p)
                    <option value="{{ $p }}" {{ old('pendidikan', $pasien->pendidikan ?? '') == $p ? 'selected' : '' }}>
                        {{ $p }}
                    </option>
                    @endforeach

                </select>
            </div>

        </div>
    </div>

    <!-- ================= KONTAK & ALAMAT ================= -->
    <div class="bg-white border rounded-2xl shadow-sm p-5">
        <h3 class="text-lg font-semibold mb-4 text-gray-800">
            Kontak & Alamat
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- NO HP -->
            <div>
                <label class="block text-sm font-medium">
                    No HP <span class="text-red-500">*</span>
                </label>

                <input type="text" name="no_hp" value="{{ old('no_hp', $pasien->no_hp ?? '') }}"
                    class="w-full border px-3 py-2 rounded-lg" required>
            </div><br>

            <!-- RT -->
            <div>
                <label class="block text-sm font-medium">
                    RT
                </label>

                <input type="text" name="rt" value="{{ old('rt', $pasien->rt ?? '') }}"
                    class="w-full border px-3 py-2 rounded-lg">
            </div>

            <!-- RW -->
            <div>
                <label class="block text-sm font-medium">
                    RW
                </label>

                <input type="text" name="rw" value="{{ old('rw', $pasien->rw ?? '') }}"
                    class="w-full border px-3 py-2 rounded-lg">
            </div>

            <!-- ALAMAT -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium">
                    Alamat
                </label>

                <textarea name="alamat" rows="1"
                    class="w-full border px-3 py-2 rounded-lg">{{ old('alamat', $pasien->alamat ?? '') }}</textarea>
            </div>

        </div>
    </div>

    <!-- ================= KELUARGA ================= -->
    <div class="bg-white border rounded-2xl shadow-sm p-5">
        <h3 class="text-lg font-semibold mb-4 text-gray-800">
            Data Keluarga
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- NAMA SUAMI -->
            <div>
                <label class="block text-sm font-medium">
                    Nama Suami
                </label>

                <input type="text" name="nama_suami" value="{{ old('nama_suami', $pasien->nama_suami ?? '') }}"
                    class="w-full border px-3 py-2 rounded-lg">
            </div>

            <!-- PEKERJAAN SUAMI -->
            <div>
                <label class="block text-sm font-medium">
                    Pekerjaan Suami
                </label>

                <input type="text" name="pekerjaan_suami"
                    value="{{ old('pekerjaan_suami', $pasien->pekerjaan_suami ?? '') }}"
                    class="w-full border px-3 py-2 rounded-lg">
            </div>

            <!-- NAMA IBU KANDUNG -->
            <div>
                <label class="block text-sm font-medium">
                    Nama Ibu Kandung
                </label>

                <input type="text" name="nama_ibu_kandung"
                    value="{{ old('nama_ibu_kandung', $pasien->nama_ibu_kandung ?? '') }}"
                    class="w-full border px-3 py-2 rounded-lg">
            </div>

            <!-- KONTAK DARURAT -->
            <div>
                <label class="block text-sm font-medium">
                    Kontak Darurat
                </label>

                <input type="text" name="kontak_darurat"
                    value="{{ old('kontak_darurat', $pasien->kontak_darurat ?? '') }}"
                    class="w-full border px-3 py-2 rounded-lg">
            </div>

        </div>
    </div>

    <!-- ================= MEDIS DASAR ================= -->
    <div class="bg-white border rounded-2xl shadow-sm p-5">
        <h3 class="text-lg font-semibold mb-4 text-gray-800">
            Medis Dasar
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- GOL DARAH -->
            <div>
                <label class="block text-sm font-medium">
                    Golongan Darah
                </label>

                <select name="gol_darah" class="w-full border px-3 py-2 rounded-lg">

                    <option value="">-- Pilih --</option>

                    @foreach(['A','B','AB','O'] as $g)
                    <option value="{{ $g }}" {{ old('gol_darah', $pasien->gol_darah ?? '') == $g ? 'selected' : '' }}>
                        {{ $g }}
                    </option>
                    @endforeach

                </select>
            </div>

            <!-- ALERGI -->
            <div>
                <label class="block text-sm font-medium">
                    Alergi
                </label>

                <input type="text" name="alergi" value="{{ old('alergi', $pasien->alergi ?? '') }}"
                    class="w-full border px-3 py-2 rounded-lg">
            </div>

            <!-- RIWAYAT PENYAKIT -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium">
                    Riwayat Penyakit
                </label>

                <textarea name="riwayat_penyakit" rows="1"
                    class="w-full border px-3 py-2 rounded-lg">{{ old('riwayat_penyakit', $pasien->riwayat_penyakit ?? '') }}</textarea>
            </div>

        </div>
    </div>

    <!-- ================= ADMINISTRASI ================= -->
    <div class="bg-white border rounded-2xl shadow-sm p-5">
        <h3 class="text-lg font-semibold mb-4 text-gray-800">
            Administrasi
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- NO BPJS -->
            <div>
                <label class="block text-sm font-medium">
                    No BPJS
                </label>

                <input type="text" name="no_bpjs" value="{{ old('no_bpjs', $pasien->no_bpjs ?? '') }}"
                    class="w-full border px-3 py-2 rounded-lg">
            </div>

            <!-- STATUS PASIEN -->
            <div>
                <label class="block text-sm font-medium">
                    Status Pasien
                </label>

                <select name="status_pasien" class="w-full border px-3 py-2 rounded-lg">

                    <option value="Aktif" {{ old('status_pasien', $pasien->status_pasien ?? '') == 'Aktif' ? 'selected'
                        : '' }}>
                        Aktif
                    </option>

                    <option value="Nonaktif" {{ old('status_pasien', $pasien->status_pasien ?? '') == 'Nonaktif' ?
                        'selected' : '' }}>
                        Nonaktif
                    </option>

                </select>
            </div>

        </div>
    </div>

</div>

<!-- BUTTON -->
<div class="flex justify-end gap-2 mt-6">

    <!-- BUTTON BATAL -->
    <a href="{{ route('pasien.index') }}"
        class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition">

        <i class="ph ph-arrow-left text-lg"></i>

        Batal
    </a>

    <!-- BUTTON SIMPAN -->
    <button type="submit"
        class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 shadow transition">

        <i class="ph ph-floppy-disk text-lg"></i>

        Simpan
    </button>

</div>
<script>
    checkNikTimeout: null,
    
    checkNik() {
    clearTimeout(this.checkNikTimeout);
    
    if (this.nik.length !== 16) {
    this.nikError = '';
    return;
    }
    
    let currentId = '{{ $pasien->id ?? '' }}';
    
    this.checkNikTimeout = setTimeout(() => {
    fetch(`/cek-nik?nik=${this.nik}&id=${currentId}`)
    .then(res => {
    if (!res.ok) throw new Error('Network error');
    return res.json();
    })
    .then(data => {
    this.nikError = data.exists ? 'NIK sudah terdaftar' : '';
    })
    .catch(() => {
    this.nikError = 'Gagal cek NIK';
    });
    }, 500);
    }
</script>