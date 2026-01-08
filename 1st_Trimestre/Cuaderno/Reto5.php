<?php
    echo "<table border='1' cellpadding='5'>";

    for ($fila = 1; $fila <= 10; $fila++) {
        echo "<tr>";
        for ($col = 1; $col <= 10; $col++) {
            $resultado = $fila * $col;
            $style = ($resultado % 2 == 0) ? " style='background-color: #ddd;'" : "";
            echo "<td$style>$resultado</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
?>
