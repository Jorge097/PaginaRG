@php $c = config('rg.contacto'); @endphp
<footer class="contact" id="cotizar">
    <div class="wrap contact__grid">
        <div class="contact__intro">
            <h2 class="h2">Cuéntanos de tu cultivo</h2>
            <p class="lede">Te respondemos con una cotización y, si lo necesitas, con una propuesta de análisis de suelo y agua.</p>

            <dl class="contact__data">
                <div>
                    <dt>Teléfono</dt>
                    <dd><a href="tel:{{ $c['telefono_href'] }}">{{ $c['telefono'] }}</a></dd>
                </div>
                <div>
                    <dt>Correo</dt>
                    <dd><a href="mailto:{{ $c['email'] }}">{{ $c['email'] }}</a></dd>
                </div>
                <div>
                    <dt>Horario</dt>
                    <dd>{{ $c['horario'] }}</dd>
                </div>
                <div>
                    <dt>Dirección</dt>
                    <dd>{{ $c['direccion'][0] }}<br>{{ $c['direccion'][1] }}</dd>
                </div>
            </dl>

            <div class="contact__map">
                <iframe src="{{ $c['mapa'] }}" title="Ubicación de RG Fertilizantes Foliares en Torreón"
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="600" height="340"></iframe>
            </div>
        </div>

        <div class="contact__form-wrap">
            @if (session('success'))
                <div class="notice notice--ok" role="status" tabindex="-1" data-focus-on-load>
                    <strong>Recibimos tu solicitud.</strong>
                    Te contactaremos en horario de atención para darte tu cotización.
                </div>
            @endif

            @if ($errors->any())
                <div class="notice notice--error" role="alert" tabindex="-1" data-focus-on-load>
                    <strong>Revisa {{ $errors->count() === 1 ? 'el campo marcado' : 'los campos marcados' }}.</strong>
                    No pudimos enviar tu solicitud todavía.
                </div>
            @endif

            <form class="form" action="{{ route('cotizaciones.store') }}" method="POST" novalidate data-quote-form>
                @csrf
                {{-- Campo trampa para bots: las personas no lo ven ni lo llenan. --}}
                <div class="form__trap" aria-hidden="true">
                    <label for="empresa_web">No llenar este campo</label>
                    <input type="text" id="empresa_web" name="empresa_web" tabindex="-1" autocomplete="off">
                </div>

                @php
                    $fields = [
                        ['Name', 'Nombre del productor', 'text', 'name', 'Nombre y apellido', ['maxlength' => 255]],
                        ['Phone', 'Teléfono', 'tel', 'tel', '871 000 0000', ['maxlength' => 20, 'inputmode' => 'tel', 'pattern' => '[0-9 +()\-]{7,20}']],
                        ['Email', 'Correo', 'email', 'email', 'tucorreo@ejemplo.com', ['maxlength' => 255]],
                        ['Location', 'Ubicación del predio', 'text', 'address-level2', 'Municipio o rancho', ['maxlength' => 255]],
                        ['Crop', 'Cultivo', 'text', 'off', 'Nogal, alfalfa, maíz…', ['maxlength' => 255, 'list' => 'cultivos-sugeridos']],
                        ['Surface', 'Superficie', 'text', 'off', 'Hectáreas', ['maxlength' => 255]],
                    ];
                @endphp

                <div class="form__grid">
                    @foreach ($fields as [$name, $label, $type, $ac, $ph, $extra])
                        <div class="field @error($name) field--invalid @enderror">
                            <label for="{{ $name }}">{{ $label }}</label>
                            <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" autocomplete="{{ $ac }}"
                                   placeholder="{{ $ph }}" value="{{ old($name) }}" required
                                   @foreach ($extra as $k => $v) {{ $k }}="{{ $v }}" @endforeach
                                   @error($name) aria-invalid="true" aria-describedby="{{ $name }}-error" @enderror>
                            @error($name)
                                <p class="field__error" id="{{ $name }}-error">{{ $message }}</p>
                            @enderror
                        </div>
                    @endforeach
                </div>

                <datalist id="cultivos-sugeridos">
                    @foreach (config('rg.cultivos') as $cultivo)
                        <option value="{{ $cultivo }}"></option>
                    @endforeach
                </datalist>

                <div class="field @error('Comment') field--invalid @enderror">
                    <label for="Comment">¿Qué producto o servicio te interesa? <span class="field__optional">Opcional</span></label>
                    <textarea id="Comment" name="Comment" rows="4" maxlength="2000"
                              placeholder="Por ejemplo: Complete Mix para 20 hectáreas de nogal, o un análisis de suelo">{{ old('Comment') }}</textarea>
                    @error('Comment')
                        <p class="field__error">{{ $message }}</p>
                    @enderror
                </div>

                <button class="btn btn--primary btn--block" type="submit">Enviar solicitud de cotización</button>
                <p class="form__note">Usamos tus datos solo para responder esta solicitud.</p>
            </form>
        </div>
    </div>

    <div class="wrap colophon">
        <p>© {{ date('Y') }} RG Fertilizantes Foliares, Torreón, Coahuila</p>
        <p>16 años nutriendo cultivos en la Comarca Lagunera</p>
    </div>
</footer>
