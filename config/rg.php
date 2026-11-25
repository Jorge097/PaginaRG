<?php

/*
| Contenido del sitio RG Fertilizantes Foliares.
| La presentación vive en resources/views; aquí solo datos.
*/

return [

    // CSP estricta (ver App\Http\Middleware\SecurityHeaders). Desactivable con CSP_ENABLED=false.
    'csp' => (bool) env('CSP_ENABLED', true),

    'contacto' => [
        'telefono' => '+52 (871) 329 7483',
        'telefono_href' => '+528713297483',
        'email' => 'RgFoliares@hotmail.com',
        'horario' => 'Lunes a viernes, 9:00 a 19:00',
        'direccion' => ['Calle Cto. Torreón 246, Aviación San Ignacio', '27016 Torreón, Coahuila'],
        'mapa' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d647.998819915458!2d-103.39466900227987!3d25.564884067305208!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x868fdb006d7984ff%3A0xdb89219ff953b8c5!2sRG%20Fertilizantes%20Foliares!5e0!3m2!1ses-419!2smx!4v1761276558728!5m2!1ses-419!2smx',
    ],

    'cultivos' => ['Nogal', 'Alfalfa', 'Maíz', 'Sorgo', 'Algodón', 'Hortalizas', 'Granado'],

    // tipo: foliar | suelo
    'productos' => [
        ['slug' => 'complete-mix', 'nombre' => 'Complete Mix', 'tipo' => 'foliar', 'imagen' => 'completemix',
            'resumen' => 'Todos los micronutrientes en una aplicación.',
            'descripcion' => 'Complementa tu programa de fertilización anual: contiene todos los micronutrientes necesarios para el buen funcionamiento de la planta.',
            'cultivos' => ['Nogal', 'Alfalfa', 'Maíz', 'Sorgo', 'Algodón', 'Hortalizas', 'Granado']],

        ['slug' => 'rg-brotacion', 'nombre' => 'RG Brotación', 'tipo' => 'foliar', 'imagen' => 'rgbrotacion',
            'resumen' => 'Brotación más uniforme desde el arranque.',
            'descripcion' => 'Estimula la brotación de las yemas de forma más uniforme y aporta un balance hormonal para una mejor división y diferenciación celular. Ideal para el arranque de cualquier cultivo.',
            'cultivos' => ['Nogal', 'Maíz', 'Sorgo', 'Algodón', 'Hortalizas', 'Granado']],

        ['slug' => 'rg-floracion', 'nombre' => 'RG Floración', 'tipo' => 'foliar', 'imagen' => 'rgfloracion',
            'resumen' => 'Más flor fecundada, más fruto.',
            'descripcion' => 'Estimula la floración y fortalece la polinización. Incrementa la división celular en la flor, lo que se traduce en una mayor fecundación del fruto. Ideal para frutales y hortalizas.',
            'cultivos' => ['Nogal', 'Maíz', 'Sorgo', 'Algodón', 'Hortalizas', 'Granado']],

        ['slug' => 'nitro-zn-17', 'nombre' => 'Nitro Zn 17', 'tipo' => 'foliar', 'imagen' => 'zinc',
            'resumen' => 'Zinc de rápida absorción para la nogalera.',
            'descripcion' => 'Elaborado a base de nitrato de zinc, lo que facilita su absorción y translocación dentro de la planta. La mejor alternativa foliar de zinc para tu huerta nogalera.',
            'cultivos' => ['Nogal', 'Maíz', 'Sorgo', 'Algodón', 'Hortalizas', 'Granado']],

        ['slug' => 'n-zinc-7-5', 'nombre' => 'N Zinc 7.5%', 'tipo' => 'foliar', 'imagen' => 'nzinc',
            'resumen' => 'Corrige deficiencias de zinc.',
            'descripcion' => 'Fuente de zinc para la fertilización foliar. Ideal para corregir deficiencias de zinc en cualquier cultivo.',
            'cultivos' => ['Nogal', 'Maíz', 'Sorgo', 'Algodón', 'Hortalizas', 'Granado']],

        ['slug' => 'stimulan-t', 'nombre' => 'Stimulan T', 'tipo' => 'foliar', 'imagen' => 'stimulant',
            'resumen' => 'Vigor y transporte activo de nutrientes.',
            'descripcion' => 'Estimula el crecimiento y el vigor de la planta, y mejora la absorción, penetración y transporte activo de nutrientes en células vegetativas y radiculares.',
            'cultivos' => ['Nogal', 'Alfalfa', 'Maíz', 'Sorgo', 'Algodón', 'Hortalizas', 'Granado']],

        ['slug' => 'niquel-5', 'nombre' => 'Níquel 5', 'tipo' => 'foliar', 'imagen' => 'niquel',
            'resumen' => 'Previene la oreja de ratón en nogal.',
            'descripcion' => 'Corrige y previene la oreja de ratón en nogal. Ayuda a reducir la caída de nuez en junio y mejora la resistencia a enfermedades.',
            'cultivos' => ['Nogal', 'Granado']],

        ['slug' => 'foliar-k21', 'nombre' => 'Foliar K21', 'tipo' => 'foliar', 'imagen' => 'foliark',
            'resumen' => 'Potasio para el llenado de nuez y fruto.',
            'descripcion' => 'Auxilia el llenado de la nuez y del fruto en maíz y hortalizas, y ayuda a la planta con el estrés por calor de julio y agosto. Corrige deficiencias de potasio en todos los cultivos.',
            'cultivos' => ['Nogal', 'Maíz', 'Sorgo', 'Algodón', 'Hortalizas', 'Granado']],

        ['slug' => 'soil-restore', 'nombre' => 'Soil Restore', 'tipo' => 'suelo', 'imagen' => 'soilrestore',
            'resumen' => 'Restaura la estructura del suelo.',
            'descripcion' => 'Mejora la estructura física y la permeabilidad del suelo, favorece el desarrollo radicular y desbloquea nutrientes en el complejo de intercambio catiónico.',
            'cultivos' => ['Nogal', 'Alfalfa', 'Maíz', 'Sorgo', 'Algodón', 'Hortalizas', 'Granado']],

        ['slug' => 'fertilizante-8-24-2', 'nombre' => 'Fertilizante 8-24-2', 'tipo' => 'suelo', 'imagen' => 'fertilizante-8',
            'resumen' => 'Fósforo líquido para suelos alcalinos.',
            'descripcion' => 'Fertilizante líquido de reacción ácida, ideal para suelos alcalinos: mejora la asimilación de nutrientes por la planta.',
            'cultivos' => ['Nogal', 'Alfalfa', 'Maíz', 'Sorgo', 'Algodón', 'Hortalizas', 'Granado']],

        ['slug' => 'fertilizante-n-20', 'nombre' => 'Fertilizante N 20', 'tipo' => 'suelo', 'imagen' => 'fertilizante-n',
            'resumen' => 'Nitrógeno para desarrollo y crecimiento.',
            'descripcion' => 'Fertilizante líquido con alto contenido de nitrógeno, ideal para aportar este nutriente en las etapas de desarrollo y crecimiento.',
            'cultivos' => ['Algodón', 'Hortalizas', 'Granado']],

        ['slug' => 'fertilizante-5-0-25', 'nombre' => 'Fertilizante 5-0-25', 'tipo' => 'suelo', 'imagen' => 'fertilizante-8',
            'resumen' => 'Potasio de alta movilidad.',
            'descripcion' => 'Fertilizante líquido con alto contenido de potasio, de alta movilidad y rápida absorción y asimilación por la planta.',
            'cultivos' => ['Algodón', 'Hortalizas', 'Granado']],
    ],

    'destacados' => ['complete-mix', 'nitro-zn-17', 'soil-restore'],

    /*
    | El año en la huerta nogalera: etapas en orden (es una secuencia real).
    | Solo se citan meses que aparecen en las fichas de producto; el resto lo
    | decide el análisis de cada huerta.
    */
    'ciclo' => [
        ['id' => 'brotacion', 'etapa' => 'Brotación', 'cuando' => 'Arranque de temporada',
            'texto' => 'Las yemas despiertan. Una brotación pareja define cómo se comportará la huerta el resto del año, y es cuando aparece la oreja de ratón.',
            'productos' => ['rg-brotacion', 'niquel-5']],
        ['id' => 'floracion', 'etapa' => 'Floración', 'cuando' => 'Primavera',
            'texto' => 'Más división celular en la flor significa más flores fecundadas y más nuez cuajada.',
            'productos' => ['rg-floracion']],
        ['id' => 'cuajado', 'etapa' => 'Cuajado', 'cuando' => 'Junio',
            'texto' => 'Es el mes de la caída de nuez. Una planta bien nutrida retiene más fruto y resiste mejor las enfermedades.',
            'productos' => ['niquel-5']],
        ['id' => 'llenado', 'etapa' => 'Llenado', 'cuando' => 'Julio y agosto',
            'texto' => 'El calor aprieta y la nuez se llena. El potasio sostiene el llenado y ayuda a la planta con el estrés por calor.',
            'productos' => ['foliar-k21']],
        ['id' => 'todo-el-ano', 'etapa' => 'Todo el año', 'cuando' => 'Según tu análisis',
            'texto' => 'Los micronutrientes y el zinc se ajustan a lo que diga el análisis de tejido de tu huerta, en la etapa que haga falta.',
            'productos' => ['complete-mix', 'nitro-zn-17']],
    ],

    // Es un proceso real y en orden: la numeración tiene sentido.
    'proceso' => [
        ['titulo' => 'Muestreo en campo', 'texto' => 'Tomamos muestras de agua, suelo y tejido vegetal directamente en tu parcela.'],
        ['titulo' => 'Análisis en laboratorio', 'texto' => 'Las analizamos en nuestro laboratorio agropecuario, conforme a las NOM vigentes para cada tipo de análisis.'],
        ['titulo' => 'Plan de nutrición', 'texto' => 'Interpretamos los resultados y diseñamos una fertilización a la medida de tu cultivo y tu suelo.'],
        ['titulo' => 'Seguimiento', 'texto' => 'Te acompañamos en siembra, desarrollo y cosecha para lograr el mayor potencial de tu cultivo.'],
    ],

    'servicios' => [
        ['id' => 'suelo', 'titulo' => 'Fertilizantes para el suelo', 'imagen' => 'fertilizantessuelo',
            'parrafos' => [
                'Un suelo fértil y bien nutrido es la base de los mejores rendimientos. Nuestros fertilizantes líquidos 8-24-2 y N 20 aportan fósforo y nitrógeno a cualquier cultivo.',
                'Cada propuesta de fertilización parte de tu análisis de suelo y agua. Para corregir problemas físico-químicos ofrecemos Soil Restore, que mejora la estructura y la permeabilidad, desbloquea nutrientes y favorece el desarrollo radicular.',
            ]],
        ['id' => 'foliares', 'titulo' => 'Fertilizantes foliares', 'imagen' => 'dron',
            'parrafos' => [
                'Cuando un análisis de tejido o la inspección visual detecta una deficiencia, la fertilización foliar es la forma más rápida de corregirla.',
                'Complete Mix reúne más de 15 nutrientes esenciales. Para correcciones específicas tenemos zinc, fierro, magnesio, cobre, manganeso, potasio y níquel, elaborados con materia prima de alta calidad y agentes quelatantes para una mejor absorción.',
            ]],
        ['id' => 'asistencia', 'titulo' => 'Asistencia técnica', 'imagen' => 'fertilizantesfoliares',
            'parrafos' => [
                'Nuestro equipo suma 30 años de experiencia en el sistema agua–suelo–planta y acompaña tu cultivo desde el muestreo hasta la cosecha.',
                'Interpretamos los análisis de suelo, agua y tejido vegetal para aprovechar al máximo cada dato y llevar tu cultivo a su mayor potencial.',
            ]],
        ['id' => 'laboratorio', 'titulo' => 'Laboratorio de suelo, agua y planta', 'imagen' => 'laboratorio',
            'parrafos' => [
                'El éxito de un cultivo no empieza en la planta, sino en el suelo y el agua donde se establece. Por eso tenemos nuestro propio laboratorio agropecuario.',
                'Realizamos los análisis conforme a las NOM vigentes y, con los resultados, te entregamos una propuesta de fertilización acorde a tu suelo y tu cultivo.',
            ]],
    ],

    'mision' => 'Ser una empresa del área agropecuaria que le permita al productor tener una alternativa de fertilizantes de calidad y confianza, necesaria para satisfacer las necesidades de nutrición de sus cultivos.',
    'vision' => 'Ser una empresa competitiva con presencia nacional, que ofrezca productos de calidad que satisfagan las necesidades de los productores, y ser parte del desarrollo económico de la región y del país.',
    'valores' => ['Honestidad', 'Calidad', 'Competitividad e innovación tecnológica', 'Responsabilidad social', 'Confianza', 'Respeto', 'Integridad'],
];
