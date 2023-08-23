<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @livewire('homepage.seo')

    <title>@yield('title')</title>
    <x-favicons></x-favicons>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="antialiased">

    <section class="flex items-center h-full p-16 dark:bg-gray-900 dark:text-gray-100">
        <div class="container flex flex-col items-center justify-center px-5 mx-auto my-8">
            <div class="max-w-md text-center">
                <h2 class="mb-8 font-extrabold text-9xl dark:text-gray-600">
                    @yield('code')
                </h2>
                <p class="text-2xl font-semibold md:text-3xl">@yield('message')</p>
                <p class="mt-4 mb-8 dark:text-gray-400">Mas não se preocupe, você pode encontrar muitas outras coisas em
                    nossa página inicial.</p>
                <a rel="noopener noreferrer" href="{{ url('') }}"
                    class="px-8 py-3 font-semibold rounded dark:bg-violet-400 dark:text-gray-900">Volte para a home</a>
            </div>
        </div>
        @livewireScripts
</body>

</html>



{{-- @section('message', __('Not Found')) --}}
