<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
        @livewire('homepage.seo')
        <title>{{ config('app.name', 'Laravel') }}</title>
        <x-favicons></x-favicons>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased" id="main">
        <div class="min-h-screen bg-gray-200 bg-cover bg-center bg-fixed"

        {{-- style="background-image: url('storage/images/donate/sistemilhas-donate-big-6.webp')"> --}}
        >
            @include('sessions.navbars.navbar')
            <section class="w-full max-w-6xl mx-auto lg:my-24 justify-center">
                <div class="flex">
                    <div class="h-screen sticky top-0 rounded-lg shadow-md mt-8 hidden lg:block">
                        @include('app.sidebar')
                    </div>
                    <!-- Page Content -->
                    <main class="w-full mt-12 lg:mt-8 px-2">
                        @yield('content')
                    </main>
                    <!-- Adsense -->
                    <div class="h-screen sticky top-0 hidden lg:block">
                        <div class="w-full mt-8 pb-0">
                            <x-ads-hostgator :type="'square'"></x-ads-hostgator>
                            <x-ads-hostgator :type="'default'"></x-ads-hostgator>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:hidden sm:flex justify-center">
                    <div class="sticky mt-8 ">
                        <x-ads-hostgator :type="'landscape'"></x-ads-hostgator>
                    </div>
                </div>
            </section>


            @include('sessions.footers.footer')
        </div>
    </body>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
