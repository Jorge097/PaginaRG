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