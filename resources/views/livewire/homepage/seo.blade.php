<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="keywords" content="{{ $meta_tags }}">
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
    <meta property="og:title" content="@yield('page-title') {{ config('app.name', 'Laravel') }}">
    <meta property="og:site_name" content="@yield('page-title') {{ config('app.name', 'Laravel') }}">
@endif
<!--DESCRIÇÃO NÃO MAIOR QUE 200-->
<meta property="og:description" content="{{ $meta_description }}">
<!--TAG NÃO MAIOR QUE 80-->
<meta property="og:keywords" content="{{ $meta_tags }}">

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
<meta name="description" content="{{ $meta_description }}">

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
    <meta name="twitter:title" content="@yield('page-title') {{ config('app.name', 'Laravel') }}">
    <!--DESCRIÇÃO NÃO MAIOR QUE 200-->
    <meta name="twitter:description" content="{{ $meta_description }}">
    <!--IMAGEM menores que 1 MB de tamanho de arquivo, > 60px por 60px e < 120px por 120px serão automaticamente redimensionadas.-->
    <meta name="twitter:image" content="{{ url('logo/sistemilhas-logo-principal.png') }}">
    <meta name="twitter:url" content="{{ url('') }}">
@endif
