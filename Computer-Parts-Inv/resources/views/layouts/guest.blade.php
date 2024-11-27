<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900">
    <div class="relative flex flex-col items-center min-h-screen pt-6 sm:flex-row sm:justify-end sm:pt-0">
        <!-- Background Layers -->
        <div class="absolute inset-0 z-10 bg-gray-900 bg-opacity-50 backdrop-blur-md clip-path-custom"></div>
        <div class="absolute inset-0 z-0 bg-center bg-cover bg-custom-image"></div>
        <!-- Login Page Content -->
        <div class="relative z-10 flex flex-col items-center justify-center space-y-2 gap-x-6 sm:w-1/2 sm:ml-2">
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
            </a>
            <div class="w-full px-4 py-4 mt-5 overflow-hidden sm:max-w-xl">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>
