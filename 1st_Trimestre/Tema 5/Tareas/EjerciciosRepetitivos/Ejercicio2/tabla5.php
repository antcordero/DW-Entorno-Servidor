<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2.3 - Multiplicar (While)</title>
</head>
<body>
    <?php
        $numero = 5;
        $i = 1;

        while ($i <= 10) {
            $resultado = $numero * $i;
            echo "<p>5 x $i = $resultado</p><br>";
            $i++;
        }
    ?>
</body>
</html>