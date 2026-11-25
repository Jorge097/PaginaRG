@props([
    'name',
    'alt',
    'sizes' => '100vw',
    'loading' => 'lazy',
    'priority' => false,
])
@php($img = \App\Support\Images::get($name))
<img
    src="{{ $img['src'] }}"
    srcset="{{ $img['srcset'] }}"
    sizes="{{ $sizes }}"
    width="{{ $img['width'] }}"
    height="{{ $img['height'] }}"
    alt="{{ $alt }}"
    loading="{{ $priority ? 'eager' : $loading }}"
    decoding="{{ $priority ? 'sync' : 'async' }}"
    @if ($priority) fetchpriority="high" @endif
    {{ $attributes }}
>
