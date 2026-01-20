<?php
if(isset($_POST['guardar'])) {
        include "dbTienda.php";
        $tienda = new dbTienda();
        $tienda->insertarProducto($_POST['nombre'], $_POST['precio'], $_POST['stock']);

        header("Location: index.php"); //Redirige al listado
        exit(); //Detiene la ejecución del script
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Producto</title>
</head>
<body>
    <h1>Crear Nuevo Producto</h1>
    <form method="post" action="crear.php">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="precio">Precio:</label><br>
        <input type="number" step="0.01" id="precio" name="precio" required><br><br>
        
        <label for="stock">Stock:</label><br>
        <input type="number" id="stock" name="stock" required><br><br>

        <input type="submit" name="guardar" value="Guardar Producto">
    </form>
    <a href="index.php">Volver al listado</a>
</body>
</html>