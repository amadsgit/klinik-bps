<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title') | RME Klinik Bidan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('logo.png') }}">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine -->
    <script src="https://unpkg.com/alpinejs" defer></script>

    <!-- Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>

</head>

<body class="bg-gradient-to-br from-blue-100 via-indigo-100 to-blue-100">
{{-- <body class="bg-gradient-to-br from-blue-500 via-indigo-500 to-blue-600"> --}}
    
    {{-- TOASTER --}}
    <div x-data="{ show: false, message: '', type: 'success' }" x-init="
        @if(session('success'))
            show = true;
            message = '{{ session('success') }}';
            type = 'success';
            setTimeout(() => show = false, 3000);
        @endif
    
        @if(session('error'))
            show = true;
            message = '{{ session('error') }}';
            type = 'error';
            setTimeout(() => show = false, 3000);
        @endif
    " x-show="show" x-transition class="fixed top-5 left-1/2 -translate-x-1/2 z-50">
    
        <div :class="{
                'bg-green-500': type === 'success',
                'bg-red-500': type === 'error'
            }" class="text-white px-5 py-3 rounded-xl shadow-lg flex items-center gap-2">
    
            <i :class="type === 'success' ? 'ph ph-check-circle' : 'ph ph-x-circle'" class="text-lg"></i>
    
            <span x-text="message"></span>
        </div>
    </div>

    <div x-data="{ sidebarOpen: false }" class="flex min-h-screen">

        <!-- SIDEBAR -->
        @include('components.sidebar')

        <!-- MAIN -->
        <div class="flex-1 flex flex-col">

            <!-- TOPBAR -->
            @include('components.topbar')

            <!-- CONTENT -->
            <main class="flex-1 p-4 md:p-6">
                <div class="flex-1 flex flex-col md:ml-64">
                <div class="bg-white/90 backdrop-blur-xl rounded-2xl shadow-xl p-5 md:p-6 space-y-6">

                    <div>
                        <h1 class="text-xl font-semibold text-gray-800">
                            @yield('title')
                        </h1>
                        <p class="text-sm text-gray-500">
                        Klinik BPS Bidan Rokayah,S.ST.,Bd
                        </p>
                    </div>

                    <div class="bg-white rounded-xl border p-5 shadow-sm">
                        @yield('content')
                    </div>

                </div>
                </div>

            </main>

            <!-- FOOTER -->
            @include('components.footer')

        </div>

    </div>
<!-- SWEETALERT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
    Swal.fire({
    title: 'Yakin hapus?',
    text: "Data akan dihapus permanen",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Hapus',
    cancelButtonText: 'Batal',
    customClass: {
    popup: 'rounded-xl',
    confirmButton: 'bg-red-600 text-white px-4 py-2 rounded-lg',
    cancelButton: 'bg-gray-200 text-gray-700 px-4 py-2 mx-2 rounded-lg'
    },
    buttonsStyling: false
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    });
}
</script>

</body>

</html>