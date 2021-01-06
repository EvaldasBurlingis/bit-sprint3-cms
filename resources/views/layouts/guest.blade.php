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
        @trixassets
    </head>
    <body class="min-h-screen bg-white font-sans antialiased">
        <section class="bg-gradient-to-r from-gray-900 to-gray-800 h-4 w-full px-4">
        </section>

        <div class="pt-8 max-w-2xl px-4 mx-auto">
            {{ $slot }}
        </div>

    </body>
</html>
