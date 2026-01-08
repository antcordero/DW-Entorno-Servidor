<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2.1 - Portero Automático</title>
</head>
<body>
    <?php
        $usuario = "admin";
        $nivel = 1;

        echo "<p>Usuario: $admin - Nivel: $nivel </p>";

        if ($usuario == "admin" && $nivel >= 0) {
            echo "<p>Acceso</p>";
        } else {
            echo "<p>Acceso Restringido</p>";
        }
    ?>
</body>
</html>