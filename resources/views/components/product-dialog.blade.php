@props(['p'])
<dialog class="sheet" data-lenis-prevent id="ficha-{{ $p['slug'] }}" aria-labelledby="ficha-{{ $p['slug'] }}-titulo">
    <div class="sheet__inner">
        <form method="dialog" class="sheet__close-form">
            <button class="sheet__close" aria-label="Cerrar ficha de {{ $p['nombre'] }}">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 6l12 12M18 6 6 18" /></svg>
            </button>
        </form>
        <span class="sheet__window" data-vt>
            <x-picture :name="$p['imagen']" alt="{{ $p['nombre'] }}" sizes="(min-width: 44em) 22rem, 90vw" class="label__img" />
        </span>
        <div class="sheet__body">
            <h2 class="sheet__title" id="ficha-{{ $p['slug'] }}-titulo">{{ $p['nombre'] }}</h2>
            <p class="sheet__text">{{ $p['descripcion'] }}</p>
            <h3 class="sheet__subtitle">Cultivos recomendados</h3>
            <ul class="tags" role="list">
                @foreach ($p['cultivos'] as $c)
                    <li>{{ $c }}</li>
                @endforeach
            </ul>
            <a class="btn btn--primary" href="#cotizar" data-cotizar="{{ $p['nombre'] }}">Cotizar {{ $p['nombre'] }}</a>
        </div>
        <p class="sheet__band label__band--{{ $p['tipo'] }}">{{ $p['tipo'] === 'foliar' ? 'Fertilizante foliar' : 'Fertilizante para suelo' }}</p>
    </div>
</dialog>
