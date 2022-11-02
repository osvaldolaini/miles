<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        {{-- Base Meta Tags --}}
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <meta name="app_url" content="{{url('')}}">
        {{-- Custom Meta Tags --}}

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @if (isset($styles))
            @foreach ($styles as $style)
                <link rel="preload" href="{{asset($style)}}" as="style" />
                <link rel="stylesheet" href="{{asset($style)}}" />
            @endforeach
        @endif

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://kit.fontawesome.com/1a5c88278b.js" crossorigin="anonymous"></script>
        @if (isset($scripts))
            @foreach ($scripts as $script)
                <script src="{{ asset($script) }}" defer></script>
            @endforeach
        @endif
    </head>
    <body class="font-sans antialiased">
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
</html>
