<!DOCTYPE html>
<html lang="es">

<head>
    <title>RG Fertilizantes Foliares</title>
    <link rel="stylesheet" href="/css/Diseno.css">
</head>

<body class="body">
    <header class="RGHeader">
        <img src="/Img/Logo2.png" alt="Logo" />
        <div class="Fertilizantes">
            <h1>RG Fertilizantes Foliares</h1>
            <p class="subtitle">REAL GROWTH FERTILIZERS</p>
        </div>
    </header>

    <nav class="Titulos">
        <a class="Botones" href="{{ route('home') }}">Inicio</a>
        <a class="Botones" href="{{ route('Productos') }}">Productos</a>
        <a class="Botones" href="¿Que hacemos?">¿Que hacemos?</a>
        <a class="Botones" href="{{ route('Somos')}}">¿Quiénes Somos?</a>
        <a class="Botones" href="#ContactoFooter">Contactanos</a>
    </nav>


    <div class="Aniversario">
        <img src="Img/Aniversario.png" alt="Aniversario">
        <br>
        <p class="subtexto">16 Años Nutriendo Sus Cultivos</p>
    </div>




    <!-- Primera parte de la pagina-->
    <div class="Somos">
        <div class="Header">
            <h2>La Mejor Opcion Para Tu Cultivo</h2>
            <p>
                En <b>RGFoliares</b> transformamos la forma de nutrir tus cultivos.
                Ofrecemos fertilizantes de alta calidad elaborados con ingredientes
                100% naturales, diseñados para fortalecer tu producción mientras cuidas
                el medio ambiente.
                Nos especializamos en análisis de tierra y agua, con un enfoque único en
                nogales, garantizando resultados visibles y sostenibles.
                No lo pienses más: si buscas un cultivo más fuerte, sano y productivo,
                contáctanos hoy mismo.
            </p>

            <button class="BProducto" href="{{ route('Productos') }}">Productos</button>
        </div>
    </div>




    <!-- Botones para mostrar la informacion -->

    <div class="contenedor">
        <div class="fila-botones">
            <div class="grupo-botones">
                <button class="boton-principal" onclick="toggleBotones(1)">Nuestros Productos</button>
                <div id="botones-1" class="botones-secundarios">
                    <button onclick="mostrarInfo(1,1, 'CompleteMix.jpg', '')">COMPLETE MIX</button>
                    <div id="info-1-1" class="info">
                        <img src="/Img/CompleteMix.jpg" alt="Complete Mix">
                        <p>
                            Este fertilizante foliar es útil para complementar su programa de fertilización anual ya que
                            contiene todos
                            los Micronutrientes necesarios para el buen funcionamiento de las plantas.
                        </p>
                    </div>
                    <button onclick="mostrarInfo(1,2, 'RgBrotacion.jpg', '')">RG BROTACIÓN</button>
                    <div id="info-1-2" class="info">
                        <img src="/Img/RgBrotacion.jpg" alt="RG Brotacion">
                        <p>
                            Este fertilizante foliar es de gran ayuda como estimulante de la brotación de sus
                            cultivos,ya que incrementa
                            el brote de las yemas en una forma más uniforme. Promoviendo la fertilidad de los brotes ya
                            que proporciona
                            un balance hormonal para una mejor división y diferenciación celular. Es ideal para el
                            arranque de cualquier
                            cultivo.
                        </p>
                    </div>
                    <button onclick="mostrarInfo(1,3, 'RgFloracion.jpg', '')">RG FLORACIÓN</button>
                    <div id="info-1-3" class="info">
                        <img src="/Img/RgFloracion.jpg" alt="RG Floracion">
                        <p>
                            Este fertilizante foliar es de gran ayuda como estimulante de la floración y para fortalecer
                            la polinización.
                            Incrementa la diferenciación y división celular en la flor lo que provoca una mayor
                            fecundación del fruto.
                            Ideal para cualquier cultivo frutal y hortalizas.
                        </p>
                    </div>
                    <button onclick="mostrarInfo(1,4, 'Zinc.jpg', '')">NITRO ZN 17</button>
                    <div id="info-1-4" class="info">
                        <img src="/Img/Zinc.jpg" alt="Nitro Zn 17">
                        <p>
                            Como fuente de Zinc es la mejor alternativa en la fertilización foliar para alcanzar la
                            mejor
                            nutrición de su huerta Nogalera ya que esta elaborado a base de Nitrato de Zinc lo que
                            facilita su absorción y translocación dentro de la planta. Ideal para cualquier cultivo.
                        </p>
                    </div>
                    <button onclick="mostrarInfo(1,5, 'Nzinc.jpg', '')">N ZINC 7.5%</button>
                    <div id="info-1-5" class="info">
                        <img src="/Img/Nzinc.jpg" alt="N Zinc 7.5%">
                        <p>
                            Como fuente de Zinc una muy buena alternativa en la fertilización foliar de sus cultivos.
                            Ideal para corregir deficiencias de Zinc en cualquier cultivo.
                        </p>
                    </div>
                    <button onclick="mostrarInfo(1,6, 'Stimulant.jpg', '')">STIMULAN T</button>
                    <div id="info-1-6" class="info">
                        <img src="/Img/Stimulant.jpg" alt="Stimulan T">
                        <p>
                            Es un fertilizante que estimula el crecimiento de las plantas, incrementando su vigor y la
                            absorción, penetración y transporte activo de nutrientes a nivel membrana, fundamental
                            en células vegetativas y radiculares, fortaleciendo el crecimiento y desarrollo vegetativo.
                        </p>
                    </div>
                    <button onclick="mostrarInfo(1,7, 'Niquel.jpg', '')">NIQUEL 5</button>
                    <div id="info-1-7" class="info">
                        <img src="/Img/Niquel.jpg" alt="NIQUEL 5">
                        <p>
                            Este fertilizante foliar es útil en la corrección y prevención de la oreja de ratón en
                            nogal.
                            Ideal para reducir la pérdida de nuez en Junio y mejorar la resistencia a enfermedades.
                        </p>
                    </div>
                    <button onclick="mostrarInfo(1,8, 'FoliarK.jpg', '')">FOLAIR K21</button>
                    <div id="info-1-8" class="info">
                        <img src="/Img/FoliarK.jpg" alt="Folair K21">
                        <p>
                            Fertilizante foliar útil para auxiliar en el llenado de la nuez en su huerta y del fruto en
                            maíz
                            y hortalizas, además de auxiliar en el estrés por las altas temperaturas de Julio y Agosto.
                            Ideal para corregir deficiencias específicas de Potasio en todos los cultivos.
                        </p>
                    </div>
                    <button onclick="mostrarInfo(1,9, 'SoilRestore.jpg', '')">SOIL RESTORE</button>
                    <div id="info-1-9" class="info">
                        <img src="/Img/SoilRestore.jpg" alt="Soil Resotore">
                        <p>
                            Es un producto que mejora la estructura física del suelo, incrementando la permeabilidad
                            y favoreciendo el desarrollo y crecimiento radicular de las plantas, incrementando su vigor
                            y desarrollo. Incrementa la absorción de nutrientes al llevar a cabo el desbloqueo de los
                            nutrientes en el complejo de intercambio catiónico.
                        </p>
                    </div>
                    <button onclick="mostrarInfo(1,10, 'Fertilizante8.jpg', '')">FERTILIZANTE 8-24-2</button>
                    <div id="info-1-10" class="info">
                        <img src="/Img/Fertilizante 8.jpg" alt="FERTILIZANTE 8-24-2">
                        <p>
                            Es un fertilizante líquido de reacción ácida, ideal para suelos alcalinos, incrementando la
                            asimilación de los nutrientes hacia la planta. Es una fuente altamente disponible de
                            Fósforo, Nitrógeno y Potasio, el cual puede ser diluido en agua o inyectarse directamente
                            al flujo en su sistema de riego, ideal para el arranque de cualquier cultivo.
                            Su contenido de ácidos orgánicos favorece la asimilación de los nutrientes presentes en el
                            suelo y que son absorbidos por la raíz de la planta.
                        </p>
                    </div>
                    <button onclick="mostrarInfo(1,11, 'FertilizanteN20.jpg', '')">FERTILIZANTE N 20</button>
                    <div id="info-1-11" class="info">
                        <img src="/Img/Fertilizante 8.jpg" alt="FERTILIZANTE N20">
                        <p>
                            Fertilizante líquido con un alto contenido de Nitrógeno ideal para aportar este nutriente
                            en las etapas de desarrollo y crecimiento de los cultivos. El cual puede ser diluído en agua
                            o inyectarse directamente al flujo del agua en su sistema de riego. Por su contenido de
                            ácidos orgánicos favorece la asimilación de los nutrientes presentes en el suelo, gracias a
                            su contenido de activadores naturales de crecimiento. Ideal para cualquier cultivo.
                        </p>
                    </div>
                    <button onclick="mostrarInfo(1,12, 'Fertilizante5-0-25.jpg', '')">FERTILIZANTE 5-0-25</button>
                    <div id="info-1-12" class="info">
                        <img src="/Img/Fertilizante 8.jpg" alt="FERTILIZANTE 5-0-25">
                        <p>
                            Es un fertilizante líquido con un alto contenido de Potasio, de alta movilidad, rápida
                            absorción y asimilación por la planta. Su aplicación favorece al sistema radicular y es
                            ideal
                            para aportar este nutriente en la etapa del llenado de fruto. Es una fuente de Potasio
                            altatamente disponible, el cual puede ser diluido en agua o inyectarse directamente al
                            flujo del agua en su sistema de riego. Ideal para la nutrición de cualquier cultivo.
                        </p>
                    </div>

                </div>
            </div>


            <div class="grupo-botones">
                <button class="boton-principal" onclick="toggleBotones(2)">Cultivos</button>
                <div id="botones-2" class="botones-secundarios">
                    <button onclick="mostrarInfo(2,1)"><b>NOGALES</b></button>
                    <div id="info-2-1" class="infoP">
                        <ul>
                            <li>STIMULAN T</li>
                            <li>RG BROTACIÓN</li>
                            <li>RG FLORACION</li>
                            <li>COMPLETE MIX</li>
                            <li>NITRO ZN 17</li>
                            <li>NIQUEL</li>
                            <li>FOLIAR K21</li>
                            <li>FERTILIZANTE 8-24-2</li>
                            <li>SOIL RESTORE</li>
                        </ul>
                    </div>
                    <button onclick="mostrarInfo(2,2)"><b>Alfalfa</b></button>
                    <div id="info-2-2" class="infoP">
                        <ul>
                            <li>STIMULAN T</li>
                            <li>COMPLETE MIX</li>
                            <li>FERTILIZANTE 8-24-2</li>
                            <li>SOIL RESTORE</li>
                        </ul>
                    </div>

                    <button onclick="mostrarInfo(2,3)"><b>MAIZ</b></button>
                    <div id="info-2-3" class="infoP">
                        <ul>
                            <li>STIMULAN T</li>
                            <li>RG BROTACIÓN</li>
                            <li>RG FLORACION</li>
                            <li>COMPLETE MIX</li>
                            <li>NITRO ZN 17</li>
                            <li>FOLIAR K21</li>
                            <li>FERTILIZANTE 8-24-2</li>
                            <li>SOIL RESTORE</li>
                        </ul>
                    </div>

                    <button onclick="mostrarInfo(2,4)"><b>SORGO</b></button>
                    <div id="info-2-4" class="infoP">
                        <ul>
                            <li>STIMULAN T</li>
                            <li>RG BROTACIÓN</li>
                            <li>RG FLORACION</li>
                            <li>COMPLETE MIX</li>
                            <li>NITRO ZN 17</li>
                            <li>FOLIAR K21</li>
                            <li>FERTILIZANTE 8-24-2</li>
                            <li>SOIL RESTORE</li>
                        </ul>
                    </div>

                    <button onclick="mostrarInfo(2,5)"><b>ALGODON</b></button>
                    <div id="info-2-5" class="infoP">
                        <ul>
                            <li>STIMULAN T</li>
                            <li>RG BROTACIÓN</li>
                            <li>RG FLORACION</li>
                            <li>COMPLETE MIX</li>
                            <li>NITRO ZN 17</li>
                            <li>FOLIAR K21</li>
                            <li>FERTILIZANTE 8-24-2</li>
                            <li>FERTILIZANTE N 20</li>
                            <li>FERTILIZANTE 5-0-25</li>
                            <li>SOIL RESTORE</li>
                        </ul>
                    </div>

                    <button onclick="mostrarInfo(2,6)"><b>HORTALIZAS</b></button>
                    <div id="info-2-6" class="infoP">
                        <ul>
                            <li>STIMULAN T</li>
                            <li>RG BROTACIÓN</li>
                            <li>RG FLORACION</li>
                            <li>COMPLETE MIX</li>
                            <li>NITRO ZN 17</li>
                            <li>FOLIAR K21</li>
                            <li>FERTILIZANTE 8-24-2</li>
                            <li>FERTILIZANTE N 20</li>
                            <li>FERTILIZANTE 5-0-25</li>
                            <li>SOIL RESTORE</li>
                        </ul>
                    </div>
                    <button onclick="mostrarInfo(2,7)"><b>GRANADO</b></button>
                    <div id="info-2-7" class="infoP">
                        <ul>
                            <li>STIMULAN T</li>
                            <li>RG BROTACIÓN</li>
                            <li>RG FLORACION</li>
                            <li>COMPLETE MIX</li>
                            <li>NITRO ZN 17</li>
                            <li>NIQUEL</li>
                            <li>FOLIAR K21</li>
                            <li>FERTILIZANTE 8-24-2</li>
                            <li>FERTILIZANTE N 20</li>
                            <li>FERTILIZANTE 5-0-25</li>
                            <li>SOIL RESTORE</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="grupo-botones">
                <button class="boton-principal" onclick="toggleBotones(3)">Contactanos</button>
                <div id="botones-3" class="botones-secundarios">
                    <P><b>RG Fertilizantes Foliares</b></P>
                    <p>Real Growth Fertilizers</p>
                    <p>Torreón Coah.</p>
                    <p>Tel. ( 871 ) 329 7483</p>
                    <a href="mailto:jjorgesilvaj@RgFoliares.com?Subject=Información">jjorgesilvaj@RgFoliares.com</a>
                    <div id="info-3-3" class="info">
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script src="/js/Boton.js"></script>

    </div>

    <footer class="Contacto" id="ContactoFooter">
        <div class="footer-container">
            <div class="footer-left">
                <img src="Img/Logo2.png" alt="Logo RGFoliares" class="footer-logo">
                <div class="footer-info">
                    <p><b>Horario de Atención</b></p>
                    <p>Lunes a Viernes de 9:00 a 19:00</p>
                    <p>Tel: +52 (871) 329 7483</p>
                    <p>Email: <a
                            href="mailto:jjorgesilvaj@RgFoliares.com?Subject=Información">jjorgesilvaj@RgFoliares.com</a>
                    </p>
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