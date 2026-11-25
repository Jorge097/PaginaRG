@props(['p'])
{{-- Etiqueta de garrafa: marco verde, ventana con la foto y la banda inferior que indica el tipo. --}}
<li class="label" data-tipo="{{ $p['tipo'] }}" data-cultivos="{{ implode('|', $p['cultivos']) }}">
    <button type="button" class="label__trigger" data-open-product="{{ $p['slug'] }}"
            aria-haspopup="dialog" aria-controls="ficha-{{ $p['slug'] }}">
        <span class="label__window" data-vt>
            <x-picture :name="$p['imagen']" alt="" sizes="(min-width: 60em) 22rem, 90vw" class="label__img" />
        </span>
        <span class="label__body">
            <span class="label__name">{{ $p['nombre'] }}</span>
            <span class="label__summary">{{ $p['resumen'] }}</span>
        </span>
        <span class="label__band label__band--{{ $p['tipo'] }}">{{ $p['tipo'] === 'foliar' ? 'Fertilizante foliar' : 'Fertilizante para suelo' }}</span>
    </button>
</li>
