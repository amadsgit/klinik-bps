<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Bidan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">Dashboard Bidan</h1>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            <div class="bg-white p-5 rounded-xl shadow">
                <p class="text-gray-500">Total Pasien</p>
                <h2 class="text-2xl font-bold">{{ $totalPasien }}</h2>
            </div>

            <div class="bg-white p-5 rounded-xl shadow">
                <p class="text-gray-500">Kunjungan Hari Ini</p>
                <h2 class="text-2xl font-bold">{{ $kunjunganHariIni }}</h2>
            </div>

            <div class="bg-yellow-100 p-5 rounded-xl shadow">
                <p class="text-gray-600">Menunggu</p>
                <h2 class="text-2xl font-bold">{{ $antrian }}</h2>
            </div>

            <div class="bg-green-100 p-5 rounded-xl shadow">
                <p class="text-gray-600">Sedang Proses</p>
                <h2 class="text-2xl font-bold">{{ $proses }}</h2>
            </div>

        </div>

    </div>

</body>

</html>