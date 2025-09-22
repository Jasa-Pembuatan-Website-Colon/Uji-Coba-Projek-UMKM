<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kedai Kopi Dashboard</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

</head>
<body class="bg-gradient-to-br from-gray-100 to-gray-200 min-h-screen font-sans">
<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-white flex flex-col p-6 shadow-xl">
        <h1 class="text-2xl font-bold mb-10 flex items-center gap-2">
            ☕ <span>Kedai Kopi</span>
        </h1>
        <nav class="flex-1 space-y-3">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 py-2 px-4 rounded-lg hover:bg-gray-700 transition">
                📊 <span>Dashboard</span>
            </a>
            <a href="{{ route('menu.index') }}" class="flex items-center gap-2 py-2 px-4 rounded-lg hover:bg-gray-700 transition">
                🍽️ <span>Menu</span>
            </a>
            <a href="{{ route('orders.index') }}" class="flex items-center gap-2 py-2 px-4 rounded-lg hover:bg-gray-700 transition">
                🛒 <span>Pesanan</span>
            </a>
        </nav>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="w-full py-2 px-4 bg-red-600 rounded-lg hover:bg-red-500 transition">Logout</button>
        </form>
    </aside>

    <!-- Main -->
    <main class="flex-1 p-10">
        @yield('content')
    </main>
</div>
</body>
</html>
