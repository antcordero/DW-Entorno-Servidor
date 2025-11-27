<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4.2 - Login Simulacro</title>
</head>
<body>
    <?php
        $baseDeDatos = [
            "admin" => "1234",
            "user" => "0000"
        ];

        $usuarioInput = "admin";
        $passInput = "1234";

        //lógica del ejercicio
        if (array_key_exists($usuarioInput, $baseDeDatos)) {
            //SI existe: Comprueba si el valor (la contraseña) coincide con $passlnput.
            if ($baseDeDatos[$usuarioInput] === $passInput) {
                echo "<h3>Bienvenido $usuarioInput</h3>";
            } else {
                echo "<h3>Contraseña incorrecta</h3>";
            }
        } else {
            echo "<h3>Usuario no encontrado</h3>";
        }

    ?>
</body>
</html>