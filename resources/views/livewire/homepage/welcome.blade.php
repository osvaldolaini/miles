<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @livewire('homepage.seo')

    <title>{{ config('app.name', 'Laravel') }}</title>

    <x-favicons></x-favicons>
    {{-- <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

    <body class="antialiased" id="main">
        @livewire('homepage.navbar')
        @livewire('homepage.hero')
        @livewire('homepage.buyer')
        @livewire('homepage.donate')
        @livewire('homepage.seller')
        @livewire('homepage.faq')
        @livewire('homepage.footer')
    </body>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9377063296356941"
    crossorigin="anonymous"></script>
</html>
