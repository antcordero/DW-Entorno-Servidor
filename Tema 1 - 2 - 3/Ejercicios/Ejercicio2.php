<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 - Operadores</title>
</head>
<body>
    <?php
        $num1 = 10;
        $num2 = 11;

        //par / impar
        if ($num1%2 == 0) {
            echo "El número $num1 es par";
        } else {
            echo "El número $num1 es impar";
        }

        if ($num2%2==0) {
            echo "El número $num2 es par";
        } else {
            echo "El número $num2 es impar";
        }

        //mayor o menor
        if ($num2 > $num1) {
            echo "El número 2 es el mayor";
        } elseif ($num2 < $num1) {
            echo "El número 1 es el mayor";
        } else {
            echo "Ambos número son inguales";
        }

        $edadPersona = 20;

        if ($edadPersona >= 18 && $edadPersona <= 65) {
            echo "Puede trabajar";
        } else if ($edadPersona < 18 || $edadPersona > 66) {
            echo "No puede trabajar";
        }

    ?>
</body>
</html>