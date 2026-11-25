@php($productos = config('rg.productos'))
<x-layouts.app page="productos" title="Productos"
    description="Catálogo de fertilizantes foliares y para suelo de RG: Complete Mix, Nitro Zn 17, Níquel 5, Foliar K21, Soil Restore y más. Filtra por cultivo.">

    <section class="page-intro" aria-labelledby="productos-title">
        <div class="wrap">
            <h1 class="display display--page" id="productos-title">
                <span class="line"><span>Productos</span></span>
            </h1>
            <p class="lede">Fertilizantes foliares de alta absorción y productos para suelo. Elige tu cultivo para ver qué le recomendamos.</p>
        </div>
    </section>

    <section class="band band--paper catalog" aria-label="Catálogo">
        <div class="wrap">
            <div class="filters" data-filters>
                <fieldset class="filters__group">
                    <legend>Cultivo</legend>
                    <div class="chips" role="group">
                        <button type="button" class="chip" aria-pressed="true" data-filter-cultivo="">Todos</button>
                        @foreach (config('rg.cultivos') as $c)
                            <button type="button" class="chip" aria-pressed="false" data-filter-cultivo="{{ $c }}">{{ $c }}</button>
                        @endforeach
                    </div>
                </fieldset>
                <fieldset class="filters__group">
                    <legend>Tipo</legend>
                    <div class="chips" role="group">
                        <button type="button" class="chip" aria-pressed="true" data-filter-tipo="">Todos</button>
                        <button type="button" class="chip" aria-pressed="false" data-filter-tipo="foliar">Foliar</button>
                        <button type="button" class="chip" aria-pressed="false" data-filter-tipo="suelo">Para suelo</button>
                    </div>
                </fieldset>
                <p class="filters__count" aria-live="polite" data-filter-count>{{ count($productos) }} productos</p>
            </div>

            <ul class="labels" role="list" data-products>
                @foreach ($productos as $p)
                    <x-product-card :p="$p" />
                @endforeach
            </ul>
            <p class="labels__empty" hidden data-products-empty>
                No tenemos un producto con esa combinación. Escríbenos y te recomendamos una alternativa para tu cultivo.
            </p>
        </div>
    </section>

    @foreach ($productos as $p)
        <x-product-dialog :p="$p" />
    @endforeach
</x-layouts.app>
