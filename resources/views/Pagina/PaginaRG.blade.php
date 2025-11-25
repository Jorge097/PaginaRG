<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RG Fertilizantes Foliares</title>
    <link rel="icon" href="{{ asset('Img/Logo2.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/Diseno.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Diseno.Laptop.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Diseno.Celular.css') }}">
</head>

<body class="body">
    <header class="RGHeader">
        <img src="{{ asset('Img/Logo2.png') }}" alt="Logo" />
        <div class="Titulo">
            <h1>RG Fertilizantes Foliares</h1>
            <p class="subtitle">REAL GROWTH FERTILIZERS</p>
        </div>
        <img src="{{ asset('Img/Aniversario.png') }}" alt="Aniversario">
    </header>

    <nav class="Links">
        <a class="Botones" href="{{ route('home') }}">Inicio</a>
        <a class="Botones" href="{{ route('Productos') }}">Productos</a>
        <a class="Botones" href="{{ route('Hacemos') }}">¿Que hacemos?</a>
        <a class="Botones" href="{{ route('Somos')}}">¿Quiénes Somos?</a>
        <a class="Botones" href="#ContactoFooter">Contactanos</a>
    </nav>


    <div class="Welcome">
        <img src="{{ asset('Img/AnalisisNueces.jpg') }}" alt="Analisis De Nueces">
        <p class="subtexto">16 Años Nutriendo Sus Cultivos</p>
    </div>


    <div class="CompleteInfo">
        <div class="Info">
            <h2>Nutrición de Precisión. Cosechas de Calidad</h2>
            <p>
                En RGFoliares, creemos que cada cultivo es único. Por eso, hemos diseñado una línea
                de fertilizantes foliares de alta absorción y acondicionadores de suelo 100% naturales.
                Nuestros productos están formulados científicamente para fortalecer tu producción, cuidar
                el medio ambiente y garantizar resultados visibles, con un enfoque especializado en nogales
                y los cultivos clave de la región. No aceptes menos que la nutrición exacta que tu cultivo necesita.
            </p>
            <a class="BProducto" href="{{ route('Productos') }}">Productos</a>
        </div>

        <div class="Info">
            <h2>Tu Cosecha en Manos Expertas: Del Análisis Científico a la Nutrición Total</h2>
            <p>
                Con 16 años de trayectoria sólida en la región Norte, hemos aprendido que una cosecha
                extraordinaria no es casualidad; es el resultado de la ciencia, la precisión y la experiencia.

                En RG Foliares, no solo te vendemos fertilizantes; te ofrecemos una solución integral.
                Todo comienza con nuestro diagnóstico de precisión: realizamos análisis avanzados de agua,
                suelo y planta para entender exactamente qué necesita tu cultivo y qué le sobra a tu tierra.

                Basados en esos datos, nuestro equipo de expertos te brinda asistencia técnica personalizada y
                diseña un plan de nutrición a medida, utilizando nuestra gama premium de fertilizantes foliares
                de alta absorción y acondicionadores de suelo que garantizan resultados visibles.
            </p>
            <a class="BProducto" href="{{ route('Hacemos') }}">¿Que hacemos?</a>
        </div>

        <div class="Info">
            <h2>Más que Productos: Un Compromiso con Tu Tierra y Tu Futuro</h2>
            <p>
                En RGFoliares, nuestro éxito no se mide solo en cosechas, sino en la confianza a
                largo plazo que construimos contigo. Nuestros 16 años de liderazgo en la región se
                basan en una filosofía de trabajo clara y un compromiso inquebrantable con el campo.
                Nuestra Misión, Visión y Valores no son solo palabras; son la brújula que guía cada análisis,
                cada asesoría y cada producto que desarrollamos. Representan nuestra promesa de ser el socio
                estratégico que tu cultivo necesita para prosperar de forma sostenible.
            </p>
            <a class="BProducto" href="{{ route('Somos') }}">¿Quiénes Somos?</a>
        </div>
    </div>
    <footer class="Contacto" id="ContactoFooter">
        <div class="footer-container">

            <div class="footer-left">
                <img src="{{ asset('Img/Logo2.png') }}" alt="Logo RGFoliares" class="footer-logo">
                <div class="footer-info">
                    <p><b>Horario de Atención</b></p>
                    <p>Lunes a Viernes de 9:00 a 19:00</p>
                    <p><b>Tel:</b> +52 (871) 329 7483</p>
                    <p><b>Email: </b><a
                            href="mailto:RgFoliares@hotmail.com?Subject=Información">RgFoliares@hotmail.com</a></p>
                    <p><b>¿Donde nos encontramos?</b></p>
                    <p>Calle Cto. Torreón 246, Aviación San Ignacio, <br> 27016 Torreón, Coah.</p>
                    <br>

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d647.998819915458!2d-103.39466900227987!3d25.564884067305208!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x868fdb006d7984ff%3A0xdb89219ff953b8c5!2sRG%20Fertilizantes%20Foliares!5e0!3m2!1ses-419!2smx!4v1761276558728!5m2!1ses-419!2smx"
                        width="300" height="150" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <div class="footer-right">

                <button id="mostrarFormulario" class="Cotizacion">Solicitar Cotización</button>

                <form action="{{ route('cotizaciones.store') }}" id="formulario" class="Form" method="POST">
                    @csrf

                    <div class="campo-doble">
                        <label for="Name">Nombre del Productor:</label>
                        <input type="text" id="Name" name="Name" placeholder="Nombre y Apellido" required>
                    </div>

                    <div class="campo-doble">
                        <label for="Phone">Teléfono:</label>
                        <input type="tel" id="Phone" name="Phone" placeholder="XXX-XXX-XXXX" required>
                    </div>

                    <div class="campo-doble">
                        <label for="Email">Correo:</label>
                        <input type="email" id="Email" name="Email" placeholder="Correo" required>
                    </div>

                    <div class="campo-doble">
                        <label for="Location">Ubicación:</label>
                        <input type="text" id="Location" name="Location" placeholder="Ubicacion" required>
                    </div>

                    <div class="campo-doble">
                        <label for="Crop">Cultivo:</label>
                        <input type="text" id="Crop" name="Crop" placeholder="Tipo de cultivo que maneja" required>
                    </div>

                    <div class="campo-doble">
                        <label for="Surface">Superficie:</label>
                        <input type="text" id="Surface" name="Surface" placeholder="Superficie" required>
                    </div>

                    <label for="Comment">Producto a Cotizar:</label>
                    <textarea id="Comment" name="Comment" placeholder="Comenta tu Interes"></textarea>

                    <button type="submit">Enviar</button>
                </form>

            </div>
        </div>
    </footer>

    <script src="{{ asset('js/Boton.js') }}"></script>
    <script src="{{ asset('js/Formulario.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });

            if (window.location.hash) {
                setTimeout(function () {
                    history.replaceState(null, null, window.location.pathname);
                }, 10);
            }
        });
    </script>

</body>

</html>