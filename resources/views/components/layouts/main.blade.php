<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body>

    <flux:navbar class="p-2 m-2">
        <flux:navbar.item href="{{ route('home') }}" :current="request()->routeIs('home')">View By Title
        </flux:navbar.item>
        <flux:navbar.item href="{{ route('bydate') }}" :current="request()->routeIs('bydate')">View By Date
        </flux:navbar.item>

    </flux:navbar>

    <div class="m-2 p-3">

        {{ $slot }}
    </div>
</body>

</html>
