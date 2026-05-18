<header x-data="{ openUser: false, openLogout: false }" class="backdrop-blur-xl bg-white/70 border-b border-white/40 px-4 md:px-6 py-3
           flex items-center justify-between shadow-sm sticky top-0 z-40">

    <!-- LEFT -->
    <div class="flex items-center gap-3">

        <!-- ☰ MOBILE -->
        <button @click="sidebarOpen = true" class="md:hidden text-gray-700">
            <i class="ph ph-list text-2xl"></i>
        </button>

    </div>

    <!-- RIGHT -->
    <div class="flex items-center gap-3 relative ml-auto">
        <!-- JAM -->
        <div class="flex items-center gap-2 bg-white/60 px-3 py-1 rounded-lg">
        
            <i class="ph ph-clock text-blue-600 text-base"></i>
        
            <div id="local-time" class="text-sm font-semibold text-blue-600">
            </div>
        
        </div>
        <button @click="openUser = !openUser" class="flex items-center gap-3 rounded-lg hover:bg-white/50 px-2 py-1">

            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=3B82F6&color=fff"
                class="w-9 h-9 rounded-full border-2 border-white shadow">

            <div class="hidden sm:block text-left">
                <p class="text-sm font-semibold text-gray-700">
                    {{ Auth::user()->name }}
                </p>
                <p class="text-xs text-gray-500">
                    {{ Auth::user()->role?->nama }}
                </p>
            </div>

            <i class="ph ph-caret-down text-blue-600"></i>
        </button>

        <!-- DROPDOWN -->
        <div x-show="openUser" @click.away="openUser = false" x-transition
            class="absolute right-0 top-full mt-2 w-52 bg-white rounded-xl shadow-lg py-2 z-50">

            <a href="#" class="flex items-center gap-2 px-4 py-2 hover:bg-blue-50">
                <i class="ph ph-user"></i> Profil Saya
            </a>

            <button @click="openUser = false; openLogout = true"
                class="flex items-center gap-2 w-full px-4 py-2 text-red-600 hover:bg-red-100">
                <i class="ph ph-sign-out"></i> Keluar
            </button>
        </div>

    </div>

    <!-- MODAL -->
    <template x-teleport="body">
        <div x-show="openLogout" x-transition
            class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/50"
            @click.self="openLogout = false">

            <div class="bg-white rounded-xl shadow-xl w-full max-w-sm p-6">
                <h2 class="text-lg font-semibold text-gray-800">Konfirmasi Keluar</h2>
                <p class="text-sm text-gray-600 mt-2">
                    Apakah Anda yakin ingin keluar?
                </p>

                <div class="flex justify-end gap-3 mt-6">
                    <button @click="openLogout = false"
                        class="px-4 py-2 border rounded-lg text-gray-600 hover:bg-gray-100">
                        Batal
                    </button>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                            Ya, Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </template>
</header>
<script>
    function updateTime() {
    const el = document.getElementById('local-time');
    if (!el) return;

    const now = new Date();
    el.innerText = now.toLocaleTimeString('id-ID');
}

setInterval(updateTime, 1000);
updateTime();
</script>