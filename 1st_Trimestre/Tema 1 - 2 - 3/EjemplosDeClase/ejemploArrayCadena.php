<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo cadena como Array</title>
</head>
<body>
    <?php
        $arrayCadenas = ["Hola", "Mundo", "PHP". "Genial"];

        foreach ($arrayCadenas as $e) {
            $letra = substr($e, 1, 1);

            echo $letra . "<br>";
        }
    ?>
</body>
</html>