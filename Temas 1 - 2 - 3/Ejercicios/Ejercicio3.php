<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 - Estructuras condicionales</title>
</head>
<body>
    <?php
        //pedir nota
        $nota_media = 9.75;
        if ($nota_media >= 9) {
            echo "<p>Sobresaliente</p>";
        } elseif ($nota_media >= 7 && $nota_media < 9) {
            echo "<p>Notable</p>";
        } elseif ($nota_media >= 5 && $nota_media < 7) {
            echo "<p>Aprobado</p>";
        } else {
            echo "<p>Suspenso</p>";
        }

        //día de la semana con switch
        $dia = "lunes";
        switch ($dia) {
            case "lunes":
                echo "Inicio de semana";
                break;
            case "viernes":
                echo "Casi fin de semana";
                break;
            default:
                echo "Otro día";
        }

        //temperatura
        $temperatura = 21;

        if ($temperatura < 0) {
            echo "La temperatura está por debajo de los 0ºC grados";
        } elseif ($temperatura >= 0 && $temperatura <= 30) {
            echo "La temperatura está entre los 0 y 30 grados ºC";
        } else {
            echo "La temperatura está por encima de los 30ºC grados";
        }

        //semáforo
        $color = "rojo";

        if ($color == "rojo") {
            echo "no puedes cruzar";
        } elseif ($color == "amarillo") {
            echo "puedes cruzar pero con precaución";
        } elseif ($color == "verde") {
            echo "puedes cruzar";
        } else {
            echo "color incorrecto";
        }
    ?>
</body>
</html>