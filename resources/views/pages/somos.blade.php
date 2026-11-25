<x-layouts.app page="somos" title="Quiénes somos"
    description="RG Foliares: especialistas en nutrición agrícola y en el sistema agua–suelo–planta, con 16 años en la Comarca Lagunera.">

    <section class="page-intro" aria-labelledby="somos-title">
        <div class="wrap about">
            <h1 class="display display--page" id="somos-title">
                <span class="line"><span>Quiénes somos</span></span>
            </h1>
            <div class="about__body">
                <p class="lede">Somos una empresa especialista en nutrición agrícola. Unimos el conocimiento químico con la experiencia de campo de nuestro personal.</p>
                <p>Nuestro equipo técnico suma 30 años en el manejo de suelo, agua y planta. Esa experiencia es la que respalda cada producto y cada recomendación que damos al productor.</p>
            </div>
        </div>
    </section>

    <section class="band band--paper purpose" aria-label="Misión y visión">
        <div class="wrap purpose__grid">
            <article>
                <h2 class="h2">Misión</h2>
                <p>{{ config('rg.mision') }}</p>
            </article>
            <article>
                <h2 class="h2">Visión</h2>
                <p>{{ config('rg.vision') }}</p>
            </article>
        </div>
    </section>

    <section class="band band--leaf values" aria-labelledby="valores-title">
        <div class="wrap">
            <h2 class="h2" id="valores-title">Valores</h2>
            <ul class="values__list" role="list">
                @foreach (config('rg.valores') as $v)
                    <li>{{ $v }}</li>
                @endforeach
            </ul>
        </div>
    </section>
</x-layouts.app>
