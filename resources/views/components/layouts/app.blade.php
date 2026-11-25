@props(['title' => null, 'description' => null, 'page' => 'inicio'])
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($title) ? $title.' — ' : '' }}RG Fertilizantes Foliares</title>
    <meta name="description" content="{{ $description ?? 'Fertilizantes foliares y para suelo, laboratorio de análisis de agua, suelo y planta, y asistencia técnica en Torreón, Coahuila. 16 años nutriendo cultivos en la Comarca Lagunera.' }}">
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
