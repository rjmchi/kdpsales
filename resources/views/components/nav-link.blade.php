@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center p-2 border rounded text-sm font-medium bg-indigo-700 text-white focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center p-2 border rounded text-sm font-medium bg-indigo-50 text-indigo-900 hover:text-gray-700 hover:border-indigo-900 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
