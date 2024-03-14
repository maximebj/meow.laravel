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
    <body class="min-h-screen bg-gray-900 font-sans antialiased">
       
        <header class="p-4 bg-gray-800 text-white">
            <div class="max-w-4xl flex items-center justify-between m-auto">
              <h1 class="text-xl font-semibold">Meow 😻</h1>

              @auth
                <form method="POST" action="{{ route('logout') }}">
                  @csrf

                  <a href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">
                    Logout
                  </a>
                </form>
              @endauth

              @guest
                <a href="{{ route('login') }}">Login</a>
              @endguest
            </div>
        </header>

        <main class="my-8 max-w-4xl m-auto">
            {{ $slot }}
        </main>
    </body>
</html>
