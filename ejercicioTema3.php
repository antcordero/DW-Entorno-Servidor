<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Tema 3</title>
</head>
<body>
    <?php 
        $nombreProducto = "PC Gaming Modelo X";
        $precioBase = 800.50;
        $stock = 8;
        $enOferta = true;

        echo "<h1>" . $nombreProducto . "</h1>";
        echo '<p>Precio base: $precioBase €</p>';
        echo "<p>Precio base:  $precioBase €</p>";

        if ($enOferta) {
            echo "<p>Precio Rebajado 10%: " . $precioBase*0.90 ."€</p>";
        } else {
            echo "<p>Precio sin oferta</p>";
        }

        if ($stock == 0) {
            echo "<p>Producto Agotado</p>";
        } else if ($stock > 0 && $stock < 10) {
            echo "<p>Últimas unidades!!</p>";
        } else {
            echo "<p>En stock</p>";
        }

        $cont = 1;

        echo "<select>";
            while ($cont <= $stock) {
                echo "<option value='" . $cont . "'>" . $cont . " Unidades</option>";
                $cont++; 
            }
        echo "</select>";
    ?>
</body>
</html>