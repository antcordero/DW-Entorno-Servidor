<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Variables y Tipos de Datos</title>
</head>
<body>
    <?php 
        $nombre = "Toni";
        $edad = 27;
        $ciudad = "Alh. Torre";
        echo "Hola, mi nombre es " . $nombre . ", tengo " . $edad . " años y vivo en " . $ciudad . ".<br/>";

        $numDecimal = 27.8;
        $numEntero = (int)$numDecimal;
        echo "Número decimal = " . $numDecimal . ", convertido a entero = " . $numEntero . "<br/>";

        $num1 = 7;
        $num2 = 8;
        echo "Suma de los dos números (num1 = " . $num1 . ", num2 = " . $num2 . ") = " . ($num1+$num2);

        $encontrado = true;
        echo "<br/>Valor booleano de la variable encontrado = " . $encontrado

    ?>
</body>
</html>