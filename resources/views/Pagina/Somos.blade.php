<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="/css/Diseno.Somos.css">
</head>
<body>
     <header class="RGHeader">
        <img src="/Img/Logo2.png" alt="Logo">
            <div class="Fertilizantes">
                <h1>RG Fertilizantes Foliares</h1>
                <p class="subtitle">REAL GROWTH FERTILIZERS</p>
            </div>
    </header>

    <nav class= "Titulos">
        <a class= "Botones" href="{{ route('home') }}">Inicio</a>
        <a class= "Botones" href="{{ route('Productos') }}">Productos</a>
        <a class= "Botones" href="¿Que hacemos?">¿Que hacemos?</a>
        <a class= "Botones" href="{{ route('Somos') }}">¿Quiénes Somos?</a>
        <a class= "Botones" href="Contactanos">Contactanos</a>
    </nav>
     
    <div class="Somos"> 
        <div class="Header-Container">
            <div class="Bloque QuienesSomos">
                <h2>¿Quienes Somos?</h2>
                <p>En <b>RG FOLIARES</b> somos una empresa especialista en Nutrición Agrícola. El gran valor
                que nuestra empresa aporta al sector radica en conjugar el conocimiento químico con
                la experiencia de nuestro personal en el área Agropecuaria.
                Nuestro equipo técnico está compuesto por personal con más de 20 años de
                experiencia en el manejo de Suelos, Agua y Planta, para brindar al productor un
                servicio de calidad y confianza en nuestros productos.
                Somos expertos en el manejo del sistema <b> AGUA - SUELO - PLANTA</b>
                </p>
            </div>

            <div class="Bloque Mision">
                <h2>Misión</h2>
                <p>Ser una empresa del área Agropecuaria que le permita al productor tener una
                alternativa de fertilizantes de calidad y confianza, necesaria para poder satisfacer las
                necesidades de nutrición de sus cultivos.
                </p>
            </div>

            <div class="Bloque Vision">
                <h2>Visión</h2>
                <p>Ser una empresa competitiva con presencia nacional, que ofrezca productos de calidad
                que satisfagan las necesidades de los productores. Así como ser parte del desarrollo
                económico de la región y del País
                </p>
            </div>
        </div>
    
        <div class="Valores-Container">
            <h2>Valores</h2>
            <ul>
                <li>HONESTIDAD</li>
                <li>CALIDAD</li>
                <li>COMPETITIVIDAD E INNOVACION DE TECNOLOGIA</li>
                <li>RESPONSABILIDAD SOCIAL</li>
                <li>CONFIANZA</li>
                <li>RESPETO</li>
                <li>INTEGRIDAD</li>
            </ul>
        </div>
    </div>


    <footer class="Contacto">
        <div class="footer-container">
            <div class="footer-left">
                <img src="Img/Logo2.png" alt="Logo RGFoliares" class="footer-logo">
                <div class="footer-info">
                    <p><b>Horario de Atención</b></p>
                    <p>Lunes a Viernes de 9:00 a 19:00</p>
                    <p>Tel: +52 (871) 329 7483</p>
                    <p>Email: <a href="mailto:jjorgesilvaj@RgFoliares.com?Subject=Información">jjorgesilvaj@RgFoliares.com</a></p>
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