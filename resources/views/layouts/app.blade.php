<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- @livewire('homepage.seo') --}}

    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="keywords" content="SisteMilhas é um local onde o usuário pode negociar suas millhas, fazendo ofertas e gerando demandas de milhas.">
<!--SMO FACEBOOK-->
<!--IDIOMA-->
<meta property="og:locale" content="pt_BR">
<!--URL DO SITE-->
<meta property="og:url" content="{{ url('') }}">
<!--TITULO-->
@if (isset($dataPage))
    <meta property="og:title" content="{{ $dataPage['title'] }}">
    <meta property="og:site_name" content="{{ $dataPage['title'] }}">
@else
    <meta property="og:title" content="{{ config('app.name', 'Laravel') }}">
    <meta property="og:site_name" content="{{ config('app.name', 'Laravel') }}">
@endif
<!--DESCRIÇÃO NÃO MAIOR QUE 200-->
<meta property="og:description" content="SisteMilhas é um local onde o usuário pode negociar suas millhas, fazendo ofertas e gerando demandas de milhas.">
<!--TAG NÃO MAIOR QUE 80-->
<meta property="og:keywords" content="milhas, gestão de milhas, oferta de milhas, venda de milhas, vender milhas, negociar">

<!--IMAGEM-->
<meta property="og:image" content="{{ url('logo/sistemilhas-logo-principal.png') }}">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="800"> <!-- PIXELS -->
<meta property="og:image:height" content="600"> <!-- PIXELS -->
<!--TIPO DO SITE OU DA PÁGINA-->
@if (isset($dataPage))
    <!-- CASO SEJA UM ARTIGO -->
    <meta property="og:type" content="website">
    <meta property="article:author" content="{{ $dataPage['user'] }}">
    <meta property="article:section" content="{{ $dataPage['title'] }}">
    <meta property="article:tag" content="{{ $dataPage['category'] }}">
    <meta property="article:published_time" content="{{ $dataPage['created_at'] }}">
@else
    <!-- CASO SEJA UM SITE NORMAL -->
    <meta property="og:type" content="website">
@endif
<!-- CASO SEJA UM SITE NORMAL -->
<meta name="description" content="SisteMilhas é um local onde o usuário pode negociar suas millhas, fazendo ofertas e gerando demandas de milhas.">

<!--SMO TWITTER-->
<!--TIPO DO SITE OU DA PÁGINA
        photo (para imagens), player (para vídeos) e Summary (para todo o resto).-->
<meta name="twitter:card " content="summary">
<!--URLs DA PAGINA-->
<meta name="twitter:domain" content="{{ url('') }}">


@if (isset($dataPage))
    <!--TITULO-->
    <meta name="twitter:title" content="{{ $dataPage['title'] }}">
    <!--DESCRIÇÃO NÃO MAIOR QUE 200-->
    <meta name="twitter:description" content="{{ $dataPage['title'] }}">
    <!--IMAGEM menores que 1 MB de tamanho de arquivo, > 60px por 60px e < 120px por 120px serão automaticamente redimensionadas.-->
    {{-- @foreach ($dataPage->images as $images)
                @if ($images->featured == '1')
                    <meta name="twitter:image" content="{{url('storage/'.$images->path.$images->title)}}">
                @endif
            @endforeach --}}
    <meta name="twitter:image" content="{{ url('logo/sistemilhas-logo-principal.png') }}">

    <meta name="twitter:url" content="{{ url($dataPage['url']) }}">
@else
    <!--TITULO-->
    <meta name="twitter:title" content="{{ config('app.name', 'Laravel') }}">
    <!--DESCRIÇÃO NÃO MAIOR QUE 200-->
    <meta name="twitter:description" content="SisteMilhas é um local onde o usuário pode negociar suas millhas, fazendo ofertas e gerando demandas de milhas.">
    <!--IMAGEM menores que 1 MB de tamanho de arquivo, > 60px por 60px e < 120px por 120px serão automaticamente redimensionadas.-->
    <meta name="twitter:image" content="{{ url('logo/sistemilhas-logo-principal.png') }}">
    <meta name="twitter:url" content="{{ url('') }}">
@endif


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
