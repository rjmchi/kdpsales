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
    <body class="font-sans text-gray-900 antialiased">
        <nav class="p-2 m-2">
            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('View By Title') }}
            </x-nav-link>
            <x-nav-link :href="route('bydate')" :active="request()->routeIs('bydate')">
                {{ __('View By Date') }}
            </x-nav-link>
        </nav>

        <div class="m-2 p-3">

                {{ $slot }}
        </div>
    </body>
</html>
