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

<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900 text-gray-700  dark:text-white" >
    <div  class="min-h-screen bg-cover bg-center bg-fixed " >
        @livewire('homepage.navbar')
        <section class="w-full max-w-6xl mx-auto justify-center">
            <div class="flex">
                <div class="h-screen sticky top-0 rounded-lg shadow-md my-8 hidden lg:block">
                    @livewire('app.side-bar')
                </div>
                <!-- Page Content -->
                <main class="w-full mt-12 lg:mt-8 px-2 min-h-screen">

                    {{ $slot }}
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
        @livewire('homepage.footer')
    </div>


    @stack('modals')

    @livewireScripts
</body>

</html>
