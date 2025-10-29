<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link rel="stylesheet" href="/css/Diseno.Hacemos.css">
</head>

<body>
    <header class="RGHeader">
        <img src="/Img/Logo2.png" alt="Logo">
        <div class="Fertilizantes">
            <h1>RG Fertilizantes Foliares</h1>
            <p class="subtitle">REAL GROWTH FERTILIZERS</p>
        </div>
    </header>

    <nav class="Titulos">
        <a class="Botones" href="{{ route('home') }}">Inicio</a>
        <a class="Botones" href="{{ route('Productos') }}">Productos</a>
        <a class="Botones" href="{{ route('Hacemos') }}">¿Que hacemos?</a>
        <a class="Botones" href="{{ route('Somos') }}">¿Quiénes Somos?</a>
        <a class="Botones" href="#ContactoFooter">Contactanos</a>
    </nav>



    <!-- Descripcion e informacion -->

    <div class="Hacemos">
        <div class="TituloInfo">
            <h2>Fertilizantes Para El Suelo</h2>
            <div class="Informacion">
                <img src="/Img/Dron.jpg" alt="Dron">
                <p>
                    Un suelo fértil y equilibrado es la base de una cosecha rentable, año tras año. Nuestros
                    fertilizantes y acondicionadores para el suelo están formulados no solo para nutrir, sino para
                    restaurar y mejorar la estructura y biología de su tierra. Basados en los resultados de sus
                    análisis, creamos mezclas que corrigen desbalances de pH, desbloquean nutrientes atrapados, mejoran
                    la retención de agua y fomentan un sistema de raíces fuerte y saludable. Nutrimos la base para que
                    toda su planta pueda prosperar.
                </p>
            </div>
        </div>

        <div class="TituloInfo">
            <h2>Fertilizantes Foliares</h2>
            <div class="Informacion">
                <img src="/Img/Dron.jpg" alt="Dron">
                <p>
                    Cuando su cultivo necesita una respuesta rápida, la nutrición foliar es la solución. Nuestros
                    fertilizantes foliares están diseñados con ingredientes de la más alta calidad para una máxima y
                    rápida absorción. Actúan como una "inyección" directa de nutrientes clave permitiendo corregir
                    deficiencias de manera casi inmediata, fortalecer laplanta en etapas críticas y ayudarla a
                    superar periodos de estrés. Es nutrición de precisión, justo cuando más se necesita.
                </p>
            </div>
        </div>

        <div class="TituloInfo">
            <h2>Asistencia Técnica</h2>
            <div class="Informacion">
                <img src="/Img/AnalisisNueces.jpg" alt="Analisis" id="Nueces">
                <p>
                    Los datos y los productos son solo herramientas; nuestra verdadera fortaleza es la experiencia para
                    usarlos. Nuestro equipo de ingenieros agrónomos no solo le entrega un reporte; lo acompañamos en el
                    campo. Le ayudamos a interpretar los resultados, a diseñar un programa de fertilización completo
                    y a tomar las decisiones correctas en el momento oportuno.Somos sus asesores estratégicos,
                    dedicados a maximizar el potencial de su cosecha.
                </p>
            </div>
        </div>

        <div class="TituloInfo">
            <h2>Análisis de Agua, Suelo y Planta</h2>
            <div class="Informacion">
                <img src="/Img/Laboratorio.jpg" alt="Laboratorio">
                <p>
                    El éxito de su cultivo no empieza en la planta, empieza en el diagnóstico. No creemos en soluciones
                    genéricas. Nuestro servicio de análisis es el punto de partida para un plan de nutrición
                    verdaderamente eficaz. Analizamos científicamente su agua de riego, la composición de su suelo y el
                    tejido foliar para descubrir con precisión qué nutrientes le sobran, cuáles le faltan y qué
                    bloqueos impiden su absorción. Estos datos son el "mapa" exacto que usamos para diseñar una solución
                    a la medida de su campo.
                </p>
            </div>
        </div>
    </div>


    <!-- Información del footer -->

    <footer class="Contacto" id="ContactoFooter">
        <div class="footer-container">
            <div class="footer-left">
                <img src="Img/Logo2.png" alt="Logo RGFoliares" class="footer-logo">
                <div class="footer-info">
                    <p><b>Horario de Atención</b></p>
                    <p>Lunes a Viernes de 9:00 a 19:00</p>
                    <p><b>Tel:</b> +52 (871) 329 7483</p>
                    <p><b>Email: </b><a
                            href="mailto:RgFoliares@hotmail.com?Subject=Información">RgFoliares@hotmail.com</a>
                    </p>
                    <p><b>¿Donde nos encontramos?</b></p>
                    <p>Calle Cto. Torreón 246, Aviación San Ignacio,
                        <br> 27016 Torreón, Coah.
                    </p>
                    <br>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d647.998819915458!2d-103.39466900227987!3d25.564884067305208!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x868fdb006d7984ff%3A0xdb89219ff953b8c5!2sRG%20Fertilizantes%20Foliares!5e0!3m2!1ses-419!2smx!4v1761276558728!5m2!1ses-419!2smx"
                        width="300" height="150" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <!--Formulario para enviar la info-->

            <button id="mostrarFormulario" class="Cotizacion">Solicitar Cotización</button>

            <form action="{{ route('cotizaciones.store') }}" id="formulario" class="Form" method="POST">
                @csrf

                <div class="campo-doble">
                    <label for="nombre">Nombre del Productor:</label>
                    <input type="text" id="Name" name="Name" placeholder="Nombre y Apellido" required>
                </div>

                <div class="campo-doble">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="Phone" name="Phone" placeholder="XXX-XXX-XXXX" required>
                </div>

                <div class="campo-doble">
                    <label for="telefono">Correo:</label>
                    <input type="email" id="Email" name="Email" placeholder="Correo" required>
                </div>

                <div class="campo-doble">
                    <label for="ubicacion">Ubicación:</label>
                    <input type="text" id="Location" name="Location" placeholder="Ubicacion" required>
                </div>

                <div class="campo-doble">
                    <label for="Cultivo">Cultivo:</label>
                    <input type="text" id="Crop" name="Crop" placeholder="Tipo de cultivo que maneja" required>
                </div>

                <div class="campo-doble">
                    <label for="surface">Superficie:</label>
                    <input type="text" id="Surface" name="Surface" placeholder="Superficie" required>
                </div>

                <label for="comentarios">Producto a Cotizar:</label>
                <textarea id="Comment" name="Comment" placeholder="Comenta tu Interes"></textarea>

                <button type="submit">Enviar</button>
                {{ csrf_field() }}
            </form>

            <script src="/js/Formulario.js"></script>

        </div>

    </footer>
</body>

</html>