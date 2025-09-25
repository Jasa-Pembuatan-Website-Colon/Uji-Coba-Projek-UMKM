<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- CSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="antialiased bg-gray-100 min-h-screen flex justify-center">

    {{-- 👉 Taruh navbar custom kamu di sini --}}
    @include('components.headerKedua')

    <main class="p-6 w-full">
        {{-- 👉 Konten halaman akan muncul di sini --}}
        @yield('content')
    </main>
</body>
</html>
