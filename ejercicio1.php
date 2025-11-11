<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <?php
        $modulos = ["Entorno Servidor", 
                    "Entorno Cliente", 
                    "Interfaces Web"
        ];

        //cambiar el valor
        $modulos[1] = "Proyecto";

        //añadir otro valor
        $modulos[] = "Entorno Cliente";

        //imprimir
        #
        echo "";
        print_r($modulos);
        echo "";
        #

        for ($i = 0; $i < count($modulos); $i++) {
            echo "<p>" . $modulos[$i] . "</p>";
        }

    ?>
</body>
</html>