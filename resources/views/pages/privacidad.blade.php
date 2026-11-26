@php
    $p = config('rg.privacidad');
    $c = config('rg.contacto');
    $domicilio = $c['direccion'][0].', '.$c['direccion'][1];
@endphp
<x-layouts.app page="privacidad" title="Aviso de privacidad"
    description="Cómo trata RG Fertilizantes Foliares los datos personales que recibe por el formulario de cotización.">

    <section class="page-intro" aria-labelledby="privacidad-title">
        <div class="wrap">
            <h1 class="display display--page" id="privacidad-title">
                <span class="line"><span>Aviso de privacidad</span></span>
            </h1>
            <p class="lede">Qué datos te pedimos, para qué los usamos y cómo puedes pedirnos que los corrijamos o los borremos.</p>
            <p class="legal__updated">Última actualización: {{ $p['actualizado'] }}</p>
        </div>
    </section>

    <section class="band band--paper legal" aria-label="Contenido del aviso">
        <div class="wrap legal__body">

            <h2 class="h3">Quién es responsable de tus datos</h2>
            <p>
                {{ $p['responsable'] }}@if ($p['rfc']), RFC {{ $p['rfc'] }}@endif,
                con domicilio en {{ $domicilio }}, es responsable del tratamiento de los datos personales que nos
                proporcionas, conforme a la Ley Federal de Protección de Datos Personales en Posesión de los Particulares.
            </p>

            <h2 class="h3">Qué datos recabamos</h2>
            <p>Solo los que escribes en el formulario de cotización:</p>
            <ul>
                <li>Nombre</li>
                <li>Teléfono y correo electrónico</li>
                <li>Ubicación del predio, cultivo y superficie</li>
                <li>El comentario que quieras agregar</li>
            </ul>
            <p>No te pedimos datos sensibles, financieros ni patrimoniales. Te pedimos no incluirlos en el comentario.</p>

            <h2 class="h3">Para qué los usamos</h2>
            <p>Usamos tus datos únicamente para:</p>
            <ul>
                <li>Responder tu solicitud y enviarte la cotización.</li>
                <li>Contactarte para aclarar la solicitud o proponerte un análisis de suelo, agua o planta relacionado con ella.</li>
            </ul>
            <p>No usamos tus datos para publicidad, no los vendemos y no los usamos para ningún otro fin.</p>

            <h2 class="h3">Cuánto tiempo los guardamos</h2>
            <p>
                Conservamos cada solicitud durante {{ $p['retencion_meses'] }} meses a partir de que la recibimos.
                Después se borra de nuestra base de datos de forma automática.
            </p>

            <h2 class="h3">Con quién los compartimos</h2>
            <p>
                No transferimos tus datos a terceros, salvo que una autoridad competente lo requiera conforme a la ley.
                Para operar el sitio usamos proveedores que tratan los datos solo por nuestra cuenta y bajo nuestras instrucciones:
            </p>
            <ul>
                <li>SiteGround, que aloja el sitio y la base de datos.</li>
                <li>Microsoft 365, con el que recibimos tu solicitud por correo.</li>
            </ul>

            <h2 class="h3">Tus derechos (ARCO)</h2>
            <p>
                Puedes acceder a tus datos, rectificarlos, cancelarlos u oponerte a su uso, y también revocar tu consentimiento.
                Para hacerlo, escríbenos a <a href="mailto:{{ $c['email'] }}">{{ $c['email'] }}</a> con:
            </p>
            <ul>
                <li>Tu nombre y un medio para responderte.</li>
                <li>Un documento que acredite tu identidad o, en su caso, la de tu representante.</li>
                <li>Qué derecho quieres ejercer y sobre qué datos.</li>
            </ul>
            <p>
                Te responderemos en un plazo máximo de 20 días hábiles. Si tu solicitud procede, la haremos efectiva
                dentro de los 15 días hábiles siguientes a nuestra respuesta.
            </p>

            <h2 class="h3">Cookies</h2>
            <p>
                El sitio usa una cookie técnica de sesión, necesaria para enviar el formulario de forma segura.
                No usamos cookies de publicidad ni de analítica. El mapa de ubicación lo muestra Google Maps,
                que puede usar sus propias cookies conforme a su política de privacidad.
            </p>

            <h2 class="h3">Cambios a este aviso</h2>
            <p>
                Si cambiamos este aviso, publicaremos la versión nueva en esta misma página con su fecha de actualización.
            </p>
        </div>
    </section>
</x-layouts.app>
