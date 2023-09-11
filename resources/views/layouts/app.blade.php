<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @livewire('homepage.seo')

    <title>@yield('page-title') {{ config('app.name', 'Laravel') }}
    </title>
    <x-favicons></x-favicons>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900 text-gray-700  dark:text-white">
    <div class="min-h-screen bg-cover bg-center bg-fixed ">
        @livewire('homepage.navbar')
        <section class="w-full max-w-6xl mx-auto justify-center">
            <div class="flex">
                <div class="h-screen sticky top-0 rounded-lg shadow-md my-8 hidden lg:block">
                    @livewire('app.side-bar')
                </div>
                <!-- Page Content -->
                <main class="w-full mt-2 lg:mt-8 px-2 min-h-screen">
                    {{ $slot }}
                </main>
                <!-- Adsense -->
                <div class="h-screen sticky top-0 hidden lg:block">
                    <div class="w-full mt-8 pb-0">
                        <a href="https://www.instagram.com/aeromiles_" target="_blank" rel="noopener noreferrer">

                            <div class="card card-compact w-auto bg-blue-200 shadow-xl p-4">
                                <figure>
                                    <picture class="h-48" {{ $attributes }}>
                                        <source srcset="{{ url('storage/ads/aero-miles.png') }}" />
                                        <source srcset="{{ url('storage/ads/aero-miles.webp') }}" />
                                        <img class="h-48" src="{{ url('storage/ads/aero-miles.png') }}"
                                            alt="sistemilhas-ads">
                                    </picture>
                                </figure>
                                <p class="w-full text-white text-right text-xs text-gray-300">
                                    Publicidade
                                </p>
                            </div>
                        </a>
                        <div class="card w-auto bg-base-100 shadow-xl image-full mt-8">
                            <figure>
                                <picture class="h-24" {{ $attributes }}>
                                    <source srcset="{{ url('storage/logo/sistemilhas-logo-principal.png') }}" />
                                    <source srcset="{{ url('storage/logo/sistemilhas-logo-principal.webp') }}" />
                                    <img class="h-24" src="{{ url('storage/logo/sistemilhas-logo-principal.png') }}"
                                        alt="sistemilhas-logo">
                                </picture>
                            </figure>
                            <div class="card-body text-white">
                                <h2 class="card-title text-white">Anucie aqui!</h2>
                                <p class="text-white">Mostre sua marca para o seu público alvo.</p>
                            </div>
                        </div>

                        <x-ads-hostgator :type="'square'"></x-ads-hostgator>

                        <x-ads-google></x-ads-google>
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
