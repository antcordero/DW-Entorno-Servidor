<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3.3 - Matriz de notas</title>
</head>
<body>
    <?php
        $clase = [
            "alumno 1" => ["Nombre" => "Ana",
                            "Nota" => 8
                        ],
            "alumno 2" => ["Nombre" => "Luis",
                            "Nota" => 4
                        ]
            ];

        //recorrer bucle
        foreach ($clase as $key => $value) {
            foreach ($value as $key2 => $value2) {
                echo "<li>$key2: $value2</li>";
                if ($value2 < 5) {
                    echo "<p>El alumno $value[Nombre] ha suspendido.</p>";
                } else {
                    echo "<p>El alumno $value[Nombre] ha aprobado.</p>";
                }
            }
        }
    ?>
</body>
</html>