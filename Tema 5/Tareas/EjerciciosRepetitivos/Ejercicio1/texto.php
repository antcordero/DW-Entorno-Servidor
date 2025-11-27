<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1.3 - Corrector de Textos</title>
</head>
<body>
    <?php
        $mensaje = "hola mundo";
        $palabra = $mensaje;

        echo "<p>$mensaje</p>";

        $palabra = trim($mensaje);
        echo "<p>Mensaje con trim(): $palabra<p/>";

        $palabra = $mensaje;
        $palabra = strtoupper($mensaje);
        echo "<p>Mensaje con strtoupper(): $palabra</p>";
    ?>
</body>
</html>