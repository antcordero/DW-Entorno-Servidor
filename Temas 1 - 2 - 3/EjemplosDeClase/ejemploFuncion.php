<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo función</title>
</head>
<body>
    <?php 
        function precio_con_iva() {
            global $precio;
            $precio_iva = $precio * 1.18;
            echo "El precio con IVA es " . $precio_iva . "€";
        }

        $precio = 10;
        precio_con_iva();
    ?>
</body>
</html>