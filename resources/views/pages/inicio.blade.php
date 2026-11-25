@php
    $productos = collect(config('rg.productos'))->keyBy('slug');
    $destacados = collect(config('rg.destacados'))->map(fn ($s) => $productos[$s]);
    $ciclo = config('rg.ciclo');
    // Fichas que hay que tener en la página: destacados + los del ciclo.
    $fichas = $destacados->keyBy('slug')
        ->union(collect($ciclo)->pluck('productos')->flatten()->unique()->mapWithKeys(fn ($s) => [$s => $productos[$s]]));
@endphp
<x-layouts.app page="inicio">

    {{-- HERO: la huerta regada al caer la tarde, con el titular encima. --}}
    <section class="hero" aria-labelledby="hero-title">
        <div class="hero__stage">
            <figure class="hero__field">
                <x-picture name="fertilizantessuelo" alt="Huerta nogalera joven recién regada por surcos en la Comarca Lagunera"
                           sizes="100vw" priority />
            </figure>
            <div class="wrap hero__head">
                <h1 class="display" id="hero-title">
                    <span class="line"><span>La cosecha</span></span>
                    <span class="line"><span>empieza</span></span>
                    <span class="line"><span>en el suelo.</span></span>
                </h1>
            </div>
        </div>

        <div class="wrap hero__foot">
            <p class="lede">
                Analizamos el agua, el suelo y la planta en nuestro laboratorio en Torreón, y con esos datos
                nutrimos tu cultivo con fertilizantes foliares y para suelo.
            </p>
            <div class="hero__actions">
                <a class="btn btn--primary" href="#cotizar">Solicitar cotización</a>
                <a class="btn btn--line" href="{{ route('Productos') }}">Ver los {{ $productos->count() }} productos</a>
            </div>
        </div>
    </section>

    {{-- FIRMA: el año en la huerta nogalera. Pestañas accesibles; sin JS se ven todas las etapas. --}}
    <section class="season" aria-labelledby="ciclo-title" data-season>
        <div class="wrap">
            <header class="season__head">
                <h2 class="h2" id="ciclo-title">El año en la huerta</h2>
                <p class="season__note">Qué pide el nogal en cada etapa. Las dosis y fechas exactas salen del análisis de tu huerta.</p>
            </header>

            <div class="season__track" role="tablist" aria-label="Etapas del nogal" data-season-tabs hidden>
                <span class="season__rail" aria-hidden="true"><span class="season__sun" data-season-sun></span></span>
                @foreach ($ciclo as $i => $e)
                    <button class="season__tab" type="button" role="tab" id="tab-{{ $e['id'] }}"
                            aria-controls="etapa-{{ $e['id'] }}" aria-selected="{{ $i === 0 ? 'true' : 'false' }}"
                            tabindex="{{ $i === 0 ? '0' : '-1' }}">
                        <span class="season__tab-name">{{ $e['etapa'] }}</span>
                        <span class="season__tab-when">{{ $e['cuando'] }}</span>
                    </button>
                @endforeach
            </div>

            <div class="season__panels">
                @foreach ($ciclo as $i => $e)
                    <article class="season__panel" id="etapa-{{ $e['id'] }}" role="tabpanel" aria-labelledby="tab-{{ $e['id'] }}"
                             tabindex="0" data-season-panel>
                        <div class="season__copy">
                            <h3 class="season__stage">{{ $e['etapa'] }}</h3>
                            <p class="season__when">{{ $e['cuando'] }}</p>
                            <p class="season__text">{{ $e['texto'] }}</p>
                        </div>
                        <ul class="season__products" role="list">
                            @foreach ($e['productos'] as $slug)
                                @php($p = $productos[$slug])
                                <li>
                                    <button type="button" class="pick" data-open-product="{{ $slug }}"
                                            aria-haspopup="dialog" aria-controls="ficha-{{ $slug }}">
                                        <span class="pick__img" data-vt><x-picture :name="$p['imagen']" alt="" sizes="5rem" /></span>
                                        <span class="pick__name">{{ $p['nombre'] }}</span>
                                        <span class="pick__summary">{{ $p['resumen'] }}</span>
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Proceso: secuencia real, por eso va numerado. --}}
    <section class="band band--paper process" aria-labelledby="proceso-title">
        <div class="wrap process__grid">
            <header class="process__head">
                <h2 class="h2" id="proceso-title">Del análisis a la cosecha</h2>
                <p class="lede">No recetamos a ciegas. Cada recomendación sale de los datos de tu parcela.</p>
            </header>
            <ol class="process__list" role="list">
                @foreach (config('rg.proceso') as $i => $paso)
                    <li class="process__step">
                        <span class="process__num" aria-hidden="true">{{ $i + 1 }}</span>
                        <div>
                            <h3 class="h3">{{ $paso['titulo'] }}</h3>
                            <p>{{ $paso['texto'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    <section class="band band--paper featured" aria-labelledby="destacados-title">
        <div class="wrap">
            <header class="section-head">
                <h2 class="h2" id="destacados-title">Los que más piden en las huertas</h2>
                <a class="link" href="{{ route('Productos') }}">Ver el catálogo completo</a>
            </header>
            <ul class="labels labels--featured" role="list">
                @foreach ($destacados as $p)
                    <x-product-card :p="$p" />
                @endforeach
            </ul>
        </div>
    </section>

    <section class="band band--sky lab" aria-labelledby="lab-title">
        <div class="wrap lab__grid">
            <div class="lab__photo">
                <x-picture name="laboratorio" alt="Técnicos de RG analizando muestras en el laboratorio"
                           sizes="(min-width: 60em) 50vw, 100vw" />
            </div>
            <div class="lab__copy">
                <h2 class="h2" id="lab-title">Nuestro propio laboratorio</h2>
                <p>Analizamos agua, suelo y tejido vegetal conforme a las NOM vigentes. Saber qué le falta a tu cultivo, y qué le sobra a tu tierra, es lo que permite fertilizar con precisión.</p>
                <dl class="facts">
                    <div><dt>30 años</dt><dd>de experiencia del equipo técnico en agua, suelo y planta</dd></div>
                    <div><dt>NOM vigentes</dt><dd>en cada tipo de análisis</dd></div>
                    <div><dt>Interpretación incluida</dt><dd>te explicamos qué significa cada resultado</dd></div>
                </dl>
                <a class="btn btn--line" href="{{ route('Hacemos') }}#laboratorio">Conocer el laboratorio</a>
            </div>
        </div>
    </section>

    <section class="band band--leaf crops" aria-labelledby="cultivos-title">
        <div class="wrap">
            <h2 class="h2" id="cultivos-title">Cultivos que nutrimos</h2>
            <ul class="crops__list" role="list">
                @foreach (config('rg.cultivos') as $cultivo)
                    <li><a href="{{ route('Productos') }}?cultivo={{ urlencode($cultivo) }}">{{ $cultivo }}</a></li>
                @endforeach
            </ul>
            <p class="crops__note">Con especialidad en nogal: zinc, níquel y potasio para cada etapa de la huerta.</p>
        </div>
    </section>

    @foreach ($fichas as $p)
        <x-product-dialog :p="$p" />
    @endforeach
</x-layouts.app>
