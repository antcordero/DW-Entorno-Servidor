<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2.2 - Dado virtual</title>
</head>
<body>
    <?php
        $dado = rand(1, 6);

        switch ($dado) {
            case 1: 
                echo "<p>Pifia</p>";
                break;

            case 6:
                echo "<p>Crítico</p>";
                break;
                
            case 2:
            case 3:
            case 4:
            case 5:
                echo "<p>Tirada normal</p>";
            break;

        }
    ?>
</body>
</html>