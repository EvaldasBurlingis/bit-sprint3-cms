<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @trixassets
    </head>
    <body class="font-sans antialiased bg-blue-50">

        <div class="bg-white">
            <nav class="py-6 max-w-6xl px-4 mx-auto flex items-center justify-between">
                <div>
                    <a href="/dashboard" class="text-blue-700 font-medium border-b-2 border-blue-700">Dashboard</a>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                        class="text-white bg-blue-600 px-4 py-2 text-sm rounded-md hover:bg-blue-700 cursor-pointer">
                        Logout
                    </a>
                </form>
            </nav>
        </div>

        <main class="px-4 max-w-6xl mx-auto">
            {{ $slot }}
        </main>
    </body>
</html>
