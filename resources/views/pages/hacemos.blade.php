<x-layouts.app page="hacemos" title="Qué hacemos"
    description="Fertilizantes para suelo y foliares, asistencia técnica y laboratorio de análisis de suelo, agua y planta en Torreón, Coahuila.">

    <section class="page-intro" aria-labelledby="hacemos-title">
        <div class="wrap">
            <h1 class="display display--page" id="hacemos-title">
                <span class="line"><span>Qué hacemos</span></span>
            </h1>
            <p class="lede">Producto, análisis y acompañamiento técnico: todo lo que tu cultivo necesita, desde un mismo equipo.</p>
            <nav class="toc" aria-label="Servicios">
                <ul role="list">
                    @foreach (config('rg.servicios') as $s)
                        <li><a href="#{{ $s['id'] }}">{{ $s['titulo'] }}</a></li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </section>

    @php($fondos = ['paper', 'sky', 'paper', 'leaf'])
    @foreach (config('rg.servicios') as $i => $s)
        <section class="band band--{{ $fondos[$i] }} service {{ $i % 2 ? 'service--flip' : '' }}"
                 id="{{ $s['id'] }}" aria-labelledby="{{ $s['id'] }}-title">
            <div class="wrap service__grid">
                <div class="service__photo">
                    <x-picture :name="$s['imagen']" alt="" sizes="(min-width: 60em) 44vw, 92vw" />
                </div>
                <div class="service__copy">
                    <h2 class="h2" id="{{ $s['id'] }}-title">{{ $s['titulo'] }}</h2>
                    @foreach ($s['parrafos'] as $parrafo)
                        <p>{{ $parrafo }}</p>
                    @endforeach
                </div>
            </div>
        </section>
    @endforeach
</x-layouts.app>
