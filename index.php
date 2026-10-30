<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introducción a HTML</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <header class="encabezado">
        <h1>Gerardo Alfonso Araque Lobo</h1>
        <p><strong>Ocupación:</strong> Desarrollador Full Stack</p>
        <p><strong>Ubicación:</strong> Pichincha, Quito, Ecuador</p>
    </header>

    <main>
        <section class="tarjeta">
            <h2> Perfil Profesional</h2>
            <p>Desarrollador Full Stack y Técnico Superior en Desarrollo de Software,
                actualmente estudiante de Ingeniría en Software. Desde 2022 desarrollo
                aplicaciones web, móviles y servicios backend, participando en todo el
                ciclo de vida del software: análisis, desarrollo, base de datos.
            </p>
        </section>

        <section class="tarjeta" id="estudios">
            <h2>Estudios</h2>
            <div class="item">
                <div class="item-cabecera">
                    <h3>Ingeniería en Software</h3>
                    <span class="fecha">En curso</span>
                </div>
                <p class="lugar">Universidad Regional Autónoma de los Andes (UNIANDES)</p>
            </div>

            <div class="item">
                <div class="item-cabecera">
                    <h3>Técnico Superior en Desarrollo de Software</h3>
                    <span class="fecha">2026</span>
                    <p class="lugar">Instituto Superior Tecnológico Quito Metropolitano (ITSQMET)</p>
                </div>
            </div>
        </section>

        <section class="tarjeta" id="experiencia">
            <h2>Experiencia Profesional</h2>
            <div class="item">
                <div class="item-cabecera">
                    <h3>Desarrollador Full Stack</h3>
                    <span class="fecha">2022 - Actualidad</span>
                </div>
                <p class="lugar">PROFERMACO CIA. LTDA</p>
                <ul>
                    <li>Desarrollo de aplicaciones web con Next.js y Angular</li>
                    <li>Desarrollo de aplicaciones móviles con Flutter</li>
                    <li>Diseño y gestión de bases de datos MySQL y PostgreSQL</li>
                </ul>
            </div>
        </section>

        <section class="tarjeta" id="conocimientos">
            <h2>Conocimientos Técnicos</h2>
            <ul>
                <li>Flutter</li>
                <li>Next.js</li>
                <li>Angular</li>
                <li>Nest.js</li>
                <li>Spring Boot</li>
                <li>MySQL</li>
                <li>PostgreSQL</li>
                <li>Git</li>
                <li>Docker</li>
            </ul>
        </section>

        <section class="tarjeta" id="contacto">
            <h2>Contacto</h2>
            <ul>
                <li><strong>Teléfono: </strong> 02212345</li>
                <li><strong>Celular: </strong> 0991234567</li>
                <li><strong>Correo: </strong> garaque@correo.com</li>
            </ul>
        </section>
    </main>

    <?php

    $numero1 = "";
    $numero2 = "";
    $operacion = "suma";
    $resultado = null;
    $error = "";

    $simbolos = [
        "suma" => "+",
        "resta" => "-",
        "multiplicacion" => "x",
        "division" => "÷"
    ];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $numero1 = $_POST["numero1"] ?? "";
        $numero2 = $_POST["numero2"] ?? "";
        $operacion = $_POST["operacion"] ?? "suma";

        if (!is_numeric($numero1) || !is_numeric($numero2)) {
            $error = "Ingrese dos números validos.";
        } else {
            $a = (float) $numero1;
            $b = (float) $numero2;

            switch ($operacion) {
                case "suma":
                    $resultado = $a + $b;
                    break;
                case "resta":
                    $resultado = $a - $b;
                    break;
                case "multiplicacion":
                    $resultado = $a * $b;
                    break;
                case "division":
                    if ($b == 0) {
                        $error = "No se puede dividir cero.";
                    } else {
                        $resultado = $a / $b;
                    }
                    break;
                default:
                    $error = "Operacion no válida.";
            }
        }
    }

    ?>

</body>

</html>