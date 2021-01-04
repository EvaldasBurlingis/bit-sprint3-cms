<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>TDD Kitchen</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap" rel="stylesheet"> 

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="min-h-screen bg-white font-sans antialiased">
        <section class="bg-gradient-to-r from-gray-900 to-gray-800 h-20 w-full px-4 pt-8 lg:h-24">
            <div class="bg-white max-w-2xl p-4 mx-auto border border-gray-200 md:py-6">
                <h1 class="text-center text-2xl font-bold md:text-4xl md:mb-1"><a href="/">Test-driven development</a></h1>
                <p class="text-sm text-center text-gray-700 md:text-base mx-auto max-w-sm">Blog about all things programming and especially focusing on TDD methodology</p>
            </div>
        </section>

        <div class="pt-16 md:pt-24 max-w-2xl px-4 mx-auto">
            {{ $slot }}
        </div>

    </body>
</html>
