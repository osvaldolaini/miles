<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @livewire('homepage.seo')

    <title>{{ config('app.name', 'Laravel') }}</title>

    <x-favicons></x-favicons>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="antialiased bg-gray-800" id="main">
    @livewire('homepage.navbar')
    @livewire('homepage.faq')
    @livewire('homepage.upcoming')
    @livewire('homepage.donate')
    @livewire('homepage.footer')
</body>

</html>
