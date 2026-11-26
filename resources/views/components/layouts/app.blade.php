@props(['title' => null, 'description' => null, 'page' => 'inicio'])
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
        $siteName = 'RG Fertilizantes Foliares';
        $pageTitle = isset($title) ? $title.' — '.$siteName : $siteName;
        $pageDescription = $description ?? 'Fertilizantes foliares y para suelo, laboratorio de análisis de agua, suelo y planta, y asistencia técnica en Torreón, Coahuila. 16 años nutriendo cultivos en la Comarca Lagunera.';
        $canonical = url()->current();
        $ogImage = asset('Img/og/rg-og.jpg');
    @endphp
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">
    <link rel="canonical" href="{{ $canonical }}">

    {{-- Vista previa al compartir el enlace (WhatsApp, Facebook, LinkedIn, X) --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $siteName }}">
    <meta property="og:locale" content="es_MX">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:url" content="{{ $canonical }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:image:secure_url" content="{{ $ogImage }}">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="Logotipo de RG Fertilizantes Foliares">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $pageDescription }}">
    <meta name="twitter:image" content="{{ $ogImage }}">
    <meta name="theme-color" content="#0B1A12">
    <link rel="icon" href="{{ asset('Img/Logo2.png') }}" type="image/png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="page page--{{ $page ?? 'inicio' }}">
    <a class="skip" href="#contenido">Saltar al contenido</a>

    @include('partials.header')

    <main id="contenido" tabindex="-1">
        {{ $slot }}
    </main>

    @include('partials.footer')
</body>
</html>
