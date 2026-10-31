<?php

$numero1 = "";
$numero2 = "";
$operacion = "suma";
$resultado = null;
$error = "";

$operaciones = [
    "suma" => ["simbolo" => "+", "nombre" => "Suma"],
    "resta" => ["simbolo" => "-", "nombre" => "Resta"],
    "multiplicacion" => ["simbolo" => "x", "nombre" => "Multiplicación"],
    "division" => ["simbolo" => "÷", "nombre" => "División"]
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $numero1 = $_POST["numero1"] ?? "";
    $numero2 = $_POST["numero2"] ?? "";
    $operacion = $_POST["operacion"] ?? "suma";

    if (!is_numeric($numero1) || !is_numeric($numero2)) {
        $error = "Ingrese dos números válidos.";
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
                    $error = "No se puede dividir entre cero.";
                } else {
                    $resultado = $a / $b;
                }
                break;
            default:
                $error = "Operación no válida.";
        }
    }
}

$simbolos = [
    "suma" => "+",
    "resta" => "-",
    "multiplicacion" => "×",
    "division" => "÷",
];

?>

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
                actualmente estudiante de Ingeniería en Software. Desde 2022 desarrollo
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
                </div>
                <p class="lugar">Instituto Superior Tecnológico Quito Metropolitano (ITSQMET)</p>
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



        <section class="tarjeta" id="calculadora">
            <h2>Calculadora</h2>

            <form method="post" action="#calculadora">
                <label for="numero1">Primer número</label>
                <input
                    type="number"
                    step="any"
                    id="numero1"
                    name="numero1"
                    value="<?= htmlspecialchars($numero1) ?>"
                    required />

                <label for="operacion">Operación</label>
                <select id="operacion" name="operacion">
                    <?php foreach ($simbolos as $valor => $simbolo): ?>
                        <option value="<?= $valor ?>" <?= $operacion === $valor ? "selected" : "" ?>>
                            <?= $simbolo ?> <?= ucfirst($valor) ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <label for="numero2">Segundo número</label>
                <input
                    type="number"
                    step="any"
                    id="numero2"
                    name="numero2"
                    value="<?= htmlspecialchars($numero2) ?>"
                    required />

                <button type="submit">Calcular</button>
            </form>

            <?php if ($error !== ""): ?>
                <div class="mensaje error"><?= $error ?></div>
            <?php elseif ($resultado !== null): ?>
                <div class="mensaje resultado">
                    <span class="operacion">
                        <?= htmlspecialchars($numero1) ?>
                        <?= $simbolos[$operacion] ?>
                        <?= htmlspecialchars($numero2) ?> =
                    </span>
                    <strong><?= round($resultado, 4) ?></strong>
                </div>
            <?php endif; ?>
        </section>

    </main>
</body>

</html>