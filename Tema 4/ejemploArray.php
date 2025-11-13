<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo unset()</title>
</head>
<body>
    <?php
        $arrayEjemplo = array("Elemento 1", "Elemento 2", "Elemento 3", "Elemento 4");

        foreach ($arrayEjemplo as $elemento) {
            echo "<p>$elemento</p>";
        }
        
        //usar unset
        unset($arrayEjemplo[2]);

        //imprimir array modificado
        foreach ($arrayEjemplo as $elemento) {
            echo "<p>$elemento</p>";
        }
        
    ?>
</body>
</html>