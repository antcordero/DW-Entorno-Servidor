<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3.2 - Paises</title>
</head>
<body>
    <?php
        $paises = [
            "España" => "Madrid",
            "Francia" => "París",
            "Italia" => "Roma"
        ];

        foreach ($paises as $key => $value) {
            echo "<li>La capital de $key es: $value</li>";
        }
    ?>
</body>
</html>