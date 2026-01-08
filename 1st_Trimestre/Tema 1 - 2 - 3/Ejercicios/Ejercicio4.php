<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 - Bucles while, for, do while</title>
</head>
<body>
    <?php
        //1 al 10 con while
        $max = 10;
        while ($max>0) {
            echo "-> $max";
            $max--;
        }

        //1 al 10 con for
        for ($i = 0 ; $i<10 ; $i++ ) {
            echo "-> $i";
        }

        //elementos de un array
        $arrayEjemplo = ["A", "B", "C", "D", "E", "F"];
        foreach ($arrayEjemplo as $elemento) {
            echo "-> $elemento";
        }
    ?>
</body>
</html>