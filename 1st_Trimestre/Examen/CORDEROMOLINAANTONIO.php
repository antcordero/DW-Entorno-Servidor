<?php
    /**
     * Nombre: Antonio Cordero Molina
     * Curso: 2 DAW 2025
    */
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antonio Cordero Molina 2DAW 2025</title>
    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }

        td, th {   
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php

    /**
     * Nombre: Antonio Cordero Molina
     * Curso: 2 DAW 2025
     */

    /**
    *  Ejercicio 1
    */
    $alumno = "Antonio Cordero Molina";
    $asistencia = 85;

    //mensaje
    echo "<h1>Ficha Academica de " . $alumno . " - Asistencia: " . $asistencia . "%</h1>";
    echo "<hr>";

    /**
    *   Ejercicio 2
    */

    $nota_final = 7.5;

    //lógica para evaluación
    if ($nota_final < 5) {
        echo "<p>Estado: Suspenso, debes recuperar.</p>";
    } else if ($nota_final >= 5 && $nota_final <= 9 ) {
        echo "<p>Estado: Aprobado, buen trabajo.</p>";
    } else if ($nota_final > 10) {
        echo "<p>Estado: Matrícula de Honor</p>";
    } else {
        echo "<p>Dato de la nota erróneo.</p>";
    }

    echo "<hr>";


    /**
    *   Ejercicio 3
    */

    //array asociativo
    $calificaciones = [
        "Programación" => 4.5,
        "Base de Datos" => 6.0,
        "Entornos" => 7.2,
        "Marcas" => 8.0
    ];

    //var_dump() para mostrar la estructura para su depuración
    var_dump($calificaciones);

    //mostrar datos del array en html
    echo "<p>Array<br>(</p>";
    
    foreach ($calificaciones as $modulo => $nota) {
        echo "<p>[". $modulo . "] => " . $nota . "</p>";
    }

    echo "<p>)</p>";
    echo "<hr>";

    /**
    *   Ejercicio 4 
    */

    $nota_media;
    $suma_notas = 0;
    $cont = 0;

    echo "<h3>Boletín de notas</h3>";

    //tabla con border visibles
    echo "<table border='1' cellpadding='5' cellspacing='5'>";
    foreach ($calificaciones as $modulo => $nota) {
        echo "<tr> <td>". $modulo . "</td><td>" . $nota . "</td></tr>";
        $suma_notas += $nota;
        $cont++;
    }
    echo "</table>";

    //imprimir media
    $nota_media = $suma_notas / $cont;

    echo "<h3>Nota media del curso: " . $nota_media . "</h3>"

?>
</body>
</html>