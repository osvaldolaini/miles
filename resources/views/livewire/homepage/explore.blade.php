<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @livewire('homepage.seo')

    <title>{{ config('app.name', 'Laravel') }}</title>

    <x-favicons></x-favicons>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="antialiased" id="main">
    @livewire('homepage.navbar')
    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">

        <div
            style="position: relative; width: 100%; height: 0; padding-top: 56.2500%;
 padding-bottom: 0; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
 border-radius: 8px; will-change: transform;">
            <iframe loading="lazy"
                style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
                src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAFr2flxspY&#x2F;view?embed"
                allowfullscreen="allowfullscreen" allow="fullscreen">
            </iframe>
        </div>
        <a href="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAFr2flxspY&#x2F;view?utm_content=DAFr2flxspY&amp;utm_campaign=designshare&amp;utm_medium=embeds&amp;utm_source=link"
            target="_blank" rel="noopener">Apresentação Sistemilhas</a> de Aeromiles

    </div>

    @livewire('homepage.buyer')
    @livewire('homepage.donate')
    @livewire('homepage.footer')
</body>

</html>
