<?php
require_once "Asistente.php";
require_once "Evento.php";

//crear evento con capacidad para 10 personas - funciona como una base de datos
$miEvento = new Evento(10);
$mensaje = "";
$claseAlerta = "";

if (isset($_POST["btnEnviar"])) { //para comprobar que los datos enviados por el formulario se hallan enviado bien
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $edad = $_POST["edad"];
    $tipo = $_POST["tipo"];

    //verificar que está vacío 
    if (empty($nomrbe) || empty($email) || empty($edad)) {
        $mensaje = "Error: Todos los campos son obligatorios.";
        $claseAlerta = "error";
    } else if (!is_numeric($edad) || $edad < 18) {
        $mensaje = "Error: Debes ser mayor de edad para asistir";
        $claseAlerta = "error";
    } else {
        $nuevoAsistente = new Asistente($nombre, $email, $edad, $tipo);

        if ($miEvento->registrarAsistente($nuevoAsistente)) {
            $mensaje = "Registro exitoso. ¡Bienvenido al evento, $nombre!";
            $claseAlerta = "exito";
        } else {
            $mensaje = "Error: No se pudo registrar. Capacidad máxima alcanzada.";
            $claseAlerta = "error";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión TechEvent 2025</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .contenedor {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            margin-bottom: 30px;
            background: #e9ecef;
            padding: 15px;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 15px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        .alerta {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            text-align: center;
        }

        .exito {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .resumen {
            font-size: 1.2em;
            font-weight: bold;
            text-align: right;
            margin-top: 20px;
            color: #007bff;
        }
    </style>
</head>

<body>

    <div class="contenedor">
        <h1>🎟️ Registro TechEvent 2025</h1>

        <?php if (!empty($mensaje)): ?>
            <div class="alerta <?php echo $claseAlerta; ?>">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>

        <form action="index.php" method="POST">
            <h3>Nuevo Asistente</h3>
            <label for="nombre">Nombre Completo:</label>
            <input type="text" name="nombre" id="nombre" placeholder="Ej: Paco Gómez" required>

            <label for="email">Correo Electrónico:</label>
            <input type="text" name="email" id="email" placeholder="Ej: paco@cesur.es">

            <label for="edad">Edad (+18):</label>
            <input type="number" name="edad" id="edad" placeholder="Ej: 22">

            <label for="tipo">Tipo de Entrada:</label>
            <select name="tipo" id="tipo">
                <option value="general">General (50€)</option>
                <option value="estudiante">Estudiante (Dto. 50%)</option>
                <option value="vip">VIP (Acceso total - 100€)</option>
            </select>

            <input type="submit" name="btnEnviar" value="Registrar y Calcular Precio">
        </form>

        <hr>

        <h3>📋 Lista de Asistentes (Simulación BBDD)</h3>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Tipo</th>
                    <th>Precio a Pagar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $lista = $miEvento->getListaAsistentes();

                foreach ($lista as $objAsistente):
                ?>
                    <tr>
                        <td><?php echo $objAsistente->getNombre(); ?></td>
                        <td><?php echo $objAsistente->getEmail(); ?></td>
                        <td><?php echo strtoupper($objAsistente->getTipoEntrada()); ?></td>
                        <td><?php echo $objAsistente->calcularPrecio(); ?> €</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="resumen">
            Recaudación Total Estimada:
            <?php echo $miEvento->calcularRecaudacionTotal(); ?> €
        </div>

    </div>
</body>
</html>