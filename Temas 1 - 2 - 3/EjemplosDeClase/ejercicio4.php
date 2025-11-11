<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <?php
        //Con array indexado
        $frutas = ["Manzana", "Pera", "Naranja"];

        echo "";
        foreach ($frutas as $fruta) {
            echo $fruta . "<br>";
        }

        //Con array asociativo
        $usuario = [
            'nombre' => 'Ana',
            'email' => 'ana@correo.com',
            'edad' => 25
        ];

        echo "<br>";
        foreach ($usuario as $clave => $valor) {
            echo "$clave: $valor <br>";
        }
        echo "<br>";

    ?>
</body>
</html>