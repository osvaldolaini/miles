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
    <div class="bg-gray-800 text-white px-4 py-0 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24">
        <div class="grid grid-cols-3 gap-4 px-0 mx-1 py-3">
            <div class="col-span-3 sm:col-span-2">
                <div
                    style="position: relative; width: 100%; height: 0; padding-top: 56%;
                        padding-bottom: 0; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
                        border-radius: 8px; will-change: transform;">
                    <iframe loading="lazy"
                        style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
                        src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAFr2flxspY&#x2F;view?embed"
                        allowfullscreen="allowfullscreen" allow="fullscreen">
                    </iframe>
                </div>
            </div>
            <div class="px-2 hidden sm:block py-4">
                <p class="font-semibold text-justify pb-2">
                    Está nascendo um novo conceito de comercialização de milhas!
                </p>
                <p class="font-semibold text-justify pb-2">

                    A Sistemilhas nasce de uma grande carência do setor de milhas aéreas em otimização, gerência fácil e
                    segurança!
                </p>
                Um solução completa que vai além dos grupos pagos e muito mais ferramentas para sua gerência!
                <p class="font-semibold text-justify pb-2">

                    Preocupado na sua segurança e na transparência do processo, a plataforma registra toda movimentação
                    e organiza os dados de maneira fácil para sua verificação!
                </p>
                <p class="font-semibold text-justify pb-2">

                    Não se limite a grupos de aplicativos de mensagens e muito menos a um grupo específico de curso ou
                    influencer.
                </p>
                <p class="font-semibold text-justify pb-2">

                    Expanda seus limites, aumente seus lucros!
                </p>
                <p class="font-semibold text-justify pb-2">

                    Experimente! Sistemilhas!
                </p>
            </div>
        </div>

        {{-- <a href="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAFr2flxspY&#x2F;view?utm_content=DAFr2flxspY&amp;utm_campaign=designshare&amp;utm_medium=embeds&amp;utm_source=link"
            target="_blank" rel="noopener">Apresentação Sistemilhas</a> de Aeromiles --}}

    </div>

    @livewire('homepage.upcoming')
    @livewire('homepage.donate')
    @livewire('homepage.faq')
    @livewire('homepage.footer')
</body>

</html>
