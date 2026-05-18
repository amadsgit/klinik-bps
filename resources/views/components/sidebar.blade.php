<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed top-0 left-0 h-screen z-50 w-64 bg-white shadow-xl border-r
    transform md:translate-x-0 transition-transform duration-300 flex flex-col">

    <!-- LOGO -->
    <div class="px-6 py-5 border-b flex items-center gap-3">
        <img src="/logo.png" class="w-10 h-10 rounded-lg shadow">
        <div>
            <h1 class="text-sm font-bold text-gray-800">BPS Bidan Rokayah</h1>
            <p class="text-xs text-gray-500">RME System</p>
        </div>
    </div>

    @php
    $role = Auth::user()->role?->nama;

    // DETECT ACTIVE GROUP
    $isMaster = request()->is('roles*','users*','pasien*','obat*','tindakan*','diagnosa*');
    $isPelayanan = request()->is('kunjungan*','kehamilan*','anc*','persalinan*','nifas*','kb*');
    $isBayi = request()->is('bayi*','kunjungan-bayi*','imunisasi*');
    $isTransaksi = request()->is('resep*','transaksi*','mutasi-obat*');
    $isUser = request()->is('roles*','users*');
    $isSupport = request()->is('jadwal-kontrol*','kunjungan-tindakan*','kunjungan-diagnosa*');
    @endphp

    <!-- MENU -->
    <div class="flex-1 overflow-y-auto py-4 space-y-2">

        <!-- DASHBOARD -->
        <a href="/dashboard" class="flex items-center gap-3 px-6 py-3 rounded-lg transition
            {{ request()->is('dashboard*') 
                ? 'bg-blue-600 text-white shadow' 
                : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
            <i class="ph ph-gauge text-lg"></i>
            <span>Dashboard</span>
        </a>

        <!-- MASTER DATA -->
        @if($role === 'admin')
        <div x-data="{ open: {{ $isMaster ? 'true' : 'false' }} }">

            <button @click="open = !open" class="w-full flex items-center justify-between px-6 py-3 rounded-lg transition
                {{ $isMaster 
                    ? 'bg-blue-50 text-blue-600 font-semibold' 
                    : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">

                <div class="flex items-center gap-3">
                    <i class="ph ph-database text-lg"></i>
                    <span>Master Data</span>
                </div>

                <i class="ph ph-caret-down transition duration-200" :class="open ? 'rotate-180' : ''"></i>
            </button>

            <div x-show="open" x-collapse class="ml-3 mt-1 space-y-1">
                <x-menu href="{{ route('pasien.index') }}" icon="ph-user" label="Pasien" />
                <x-menu href="{{ route('obat.index') }}" icon="ph-pill" label="Obat" />
                <x-menu href="{{ route('tindakan.index') }}" icon="ph-scissors" label="Tindakan" />
                <x-menu href="{{ route('diagnosa.index') }}" icon="ph-heartbeat" label="Diagnosa" />
            </div>
        </div>
        @endif


        <!-- PELAYANAN -->
        @if(in_array($role, ['admin','bidan','dokter']))
        <div x-data="{ open: {{ $isPelayanan ? 'true' : 'false' }} }">

            <button @click="open = !open" class="w-full flex items-center justify-between px-6 py-3 rounded-lg transition
                {{ $isPelayanan 
                    ? 'bg-blue-50 text-blue-600 font-semibold' 
                    : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">

                <div class="flex items-center gap-3">
                    <i class="ph ph-stethoscope text-lg"></i>
                    <span>Pelayanan</span>
                </div>

                <i class="ph ph-caret-down transition duration-200" :class="open ? 'rotate-180' : ''"></i>
            </button>

            <div x-show="open" x-collapse class="ml-3 mt-1 space-y-1">
                <x-menu href="/kunjungan" icon="ph-calendar-check" label="Kunjungan" />
                <x-menu href="/kehamilan" icon="ph-baby" label="Kehamilan" />
                <x-menu href="/anc" icon="ph-stethoscope" label="ANC" />
                <x-menu href="/persalinan" icon="ph-heart" label="Persalinan" />
                <x-menu href="/nifas" icon="ph-first-aid" label="Nifas" />
                <x-menu href="/kb" icon="ph-shield-check" label="KB" />
            </div>
        </div>
        @endif


        <!-- BAYI -->
        @if(in_array($role, ['admin','bidan','dokter']))
        <div x-data="{ open: {{ $isBayi ? 'true' : 'false' }} }">

            <button @click="open = !open" class="w-full flex items-center justify-between px-6 py-3 rounded-lg transition
                {{ $isBayi 
                    ? 'bg-blue-50 text-blue-600 font-semibold' 
                    : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">

                <div class="flex items-center gap-3">
                    <i class="ph ph-baby text-lg"></i>
                    <span>Bayi & Anak</span>
                </div>

                <i class="ph ph-caret-down transition duration-200" :class="open ? 'rotate-180' : ''"></i>
            </button>

            <div x-show="open" x-collapse class="ml-3 mt-1 space-y-1">
                <x-menu href="/bayi" icon="ph-baby" label="Data Bayi" />
                <x-menu href="/kunjungan-bayi" icon="ph-calendar-plus" label="Kunjungan Bayi" />
                <x-menu href="/imunisasi" icon="ph-syringe" label="Imunisasi" />
            </div>
        </div>
        @endif


        <!-- TRANSAKSI -->
        @if($role === 'admin')
        <div x-data="{ open: {{ $isTransaksi ? 'true' : 'false' }} }">

            <button @click="open = !open" class="w-full flex items-center justify-between px-6 py-3 rounded-lg transition
                {{ $isTransaksi 
                    ? 'bg-blue-50 text-blue-600 font-semibold' 
                    : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">

                <div class="flex items-center gap-3">
                    <i class="ph ph-cash-register text-lg"></i>
                    <span>Transaksi</span>
                </div>

                <i class="ph ph-caret-down transition duration-200" :class="open ? 'rotate-180' : ''"></i>
            </button>

            <div x-show="open" x-collapse class="ml-3 mt-1 space-y-1">
                <x-menu href="/resep" icon="ph-file-text" label="Resep" />
                <x-menu href="/transaksi" icon="ph-cash-register" label="Transaksi" />
                <x-menu href="/mutasi-obat" icon="ph-arrows-left-right" label="Mutasi Obat" />
            </div>
        </div>
        @endif


        <!-- MANAJEMEN USER -->
        @if($role === 'admin')
        <div x-data="{ open: {{ $isUser ? 'true' : 'false' }} }">

            <button @click="open = !open" class="w-full flex items-center justify-between px-6 py-3 rounded-lg transition
                {{ $isUser 
                    ? 'bg-blue-50 text-blue-600 font-semibold' 
                    : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">

                <div class="flex items-center gap-3">
                    <i class="ph ph-users text-lg"></i>
                    <span>Manajemen User</span>
                </div>

                <i class="ph ph-caret-down transition duration-200" :class="open ? 'rotate-180' : ''"></i>
            </button>

            <div x-show="open" x-collapse class="ml-3 mt-1 space-y-1">
                <x-menu href="{{ route('role.index') }}" icon="ph-user-gear" label="Roles" />
                <x-menu href="{{ route('user.index') }}" icon="ph-users" label="Users" />
            </div>
        </div>
        @endif


        <!-- SUPPORT -->
        @if(in_array($role, ['admin','bidan','dokter']))
        <div x-data="{ open: {{ $isSupport ? 'true' : 'false' }} }">

            <button @click="open = !open" class="w-full flex items-center justify-between px-6 py-3 rounded-lg transition
                {{ $isSupport 
                    ? 'bg-blue-50 text-blue-600 font-semibold' 
                    : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">

                <div class="flex items-center gap-3">
                    <i class="ph ph-gear text-lg"></i>
                    <span>Support</span>
                </div>

                <i class="ph ph-caret-down transition duration-200" :class="open ? 'rotate-180' : ''"></i>
            </button>

            <div x-show="open" x-collapse class="ml-3 mt-1 space-y-1">
                <x-menu href="/jadwal-kontrol" icon="ph-clock" label="Jadwal Kontrol" />
                <x-menu href="/kunjungan-tindakan" icon="ph-activity" label="Tindakan" />
                <x-menu href="/kunjungan-diagnosa" icon="ph-heartbeat" label="Diagnosa" />
            </div>
        </div>
        @endif

    </div>

    <!-- USER -->
    <div class="p-4 border-t">
        <div class="flex items-center gap-3">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=3B82F6&color=fff"
                class="w-10 h-10 rounded-full">

            <div>
                <p class="text-sm font-semibold text-gray-700">
                    {{ Auth::user()->name }}
                </p>
                <p class="text-xs text-gray-500">
                    {{ Auth::user()->role?->nama }}
                </p>
            </div>
        </div>
    </div>

</aside>

<!-- OVERLAY -->
<div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black/40 z-40 md:hidden">
</div>