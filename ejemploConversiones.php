<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <?php
        $soloEuros=5;
        $centimos=43;
        $dinero = $soloEuros + (float)($centimos/100);
        echo "Tienes $dinero euros.";
    ?>
    </body>
</html>