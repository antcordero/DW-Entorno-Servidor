<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3.1 - Tareas</title>
</head>
<body>
    <?php
        $tareas = [
            "Comprar pan",
            "Estudiar PHP", 
            "Hacer ejercicio"
        ];

        //añadir
        $tareas[] = "Dormir";

        foreach ($tareas as $tarea) {
            echo "<li>-> $tarea</li>";
        }
    ?>
</body>
</html>