@php
    $links = [
        ['route' => 'home', 'label' => 'Inicio'],
        ['route' => 'Productos', 'label' => 'Productos'],
        ['route' => 'Hacemos', 'label' => 'Qué hacemos'],
        ['route' => 'Somos', 'label' => 'Quiénes somos'],
    ];
@endphp
<header class="site-header" data-header>
    <div class="site-header__bar">
        <a class="brand" href="{{ route('home') }}" aria-label="RG Fertilizantes Foliares, ir al inicio">
            <x-picture name="logo2" alt="" sizes="2.75rem" class="brand__mark" priority />
            <span class="brand__name">RG Fertilizantes<span> Foliares</span></span>
        </a>

        <button class="menu-toggle" type="button" popovertarget="menu" data-menu-toggle>
            <span class="menu-toggle__label">Menú</span>
            <span class="menu-toggle__icon" aria-hidden="true"><i></i><i></i></span>
        </button>

        <nav class="nav" id="menu" aria-label="Principal" popover data-menu>
            <ul role="list">
                @foreach ($links as $l)
                    <li>
                        <a class="nav__link" href="{{ route($l['route']) }}"
                           @if (request()->routeIs($l['route'])) aria-current="page" @endif>{{ $l['label'] }}</a>
                    </li>
                @endforeach
            </ul>
            <a class="btn btn--primary nav__cta" href="#cotizar">Solicitar cotización</a>
        </nav>
    </div>
</header>
