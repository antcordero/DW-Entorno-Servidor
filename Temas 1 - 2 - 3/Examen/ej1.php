<!-- Nombre: Antonio Cordero Molina -->
<!-- 2DAW - Entorno Servidor -->
<!-- 13 noviembre 2025 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen Servidor - Antonio Cordero</title>
</head>
<body>
    <?php
        //variables
        $nombre_alumno = "Antonio Cordero Molina";
        $modulo = "Desarrollo Web en Entorno Servidor";
        $nota_media = 7.5;
        $es_matriculado = true;

        //impresion con echo
        echo "<h1>" . $nombre_alumno . "</h1>";
        echo "<h2>" . $modulo . "</h2>";
        //impresión con comillas dobles vs comillas simples
        echo "<p>Mi nota media actual es: $nota_media</p>";
        echo '<p>Mi nota media actual es: $nota_media</p>';

        //decisiones
        //mensaje según nota del alumno
        if ($nota_media >= 9) {
            echo "<p>Sobresaliente<p>";
        } elseif ($nota_media >= 7 && $nota_media < 9) {
            echo "<p>Notable<p>";
        } elseif ($nota_media >= 5 && $nota_media < 7) {
            echo "<p>Aprobado<p>";
        } else {
            echo "<p>Suspenso<p>";
        }

        //mensaje según estado de matriculación
        if ($es_matriculado) {
            echo "<p>Estado: Alumno matriculado</p>";
        } else {
            echo "<p>Estado: Alumno NO matriculado</p>";
        }

        //crear tabla con bucle while
        $filas = 0;
        $i = 0;
        echo "<table>";
        echo "<tr>";
        while ($filas<=5) {
            echo "<td>Fila Número: </td>";
            $filas++;
        }
        echo "</tr>";
        echo "<tr>";
        while ($i<=$filas) {
            echo "<td>$i</td>";
            $i++;
        }
        echo "</tr>";
        echo "</table>";
    ?>
</body>
</html>