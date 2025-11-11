<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <?php
        if (isset($POST['nombre'])) {
            echo "Datos recibidos (cpon foreach):";
            echo "";

            //Recorremos $_POST como cualquier otro array asociativo
            foreach ($_POST as $clave => $valor) {
                echo "$clave: $valor";
            }

            echo "<br>";
        }

    ?>
    </body>
</html>