<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/logo.png">

    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-500 to-indigo-600 min-h-screen flex items-center justify-center">

    <div class="bg-white/90 backdrop-blur-lg shadow-2xl rounded-2xl p-8 w-full max-w-md text-center">

        <!-- Logo -->
        <img src="/logo.png" alt="Logo Klinik" class="w-20 mx-auto mb-4">

        <h2 class="text-2xl font-bold text-gray-800">
            Login
        </h2>
        <p class="text-gray-500">Silahkan login untuk masuk ke sistem</p>

        @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-left">
            {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action="/login" class="space-y-5 text-left">
            @csrf

            <div>
                <label class="text-sm text-gray-600">Email</label>
                <input type="email" name="email" required
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none">
            </div>

            <div>
                <label class="text-sm text-gray-600">Password</label>
                <input type="password" name="password" required
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none">
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold transition">
                Login
            </button>
        </form>

        <p class="text-center text-xs text-gray-500 mt-6">
            © Klinik BPS Bidan Rokayah,S.ST.,Bd
        </p>

    </div>

</body>

</html>