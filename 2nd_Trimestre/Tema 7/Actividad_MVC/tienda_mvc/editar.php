<?php
    include "dbTienda.php";
    $tienda = new dbTienda();
    
    if(isset($_POST['guardar'])) {
        $tienda->insertarProducto($_POST['nombre'], $_POST['precio'], $_POST['stock']);
        header("Location: index.php");
        exit();
    }

    if(isset($_GET['id'])) {
        $id_producto = $_GET['id']; //Obtener el id del producto a editar
        //Buscar el producto en la base de datos
        $lista = $tienda->buscarPorID($id_producto);
    } else {
        header("Location: index.php"); //Redirige al listado si no hay id
        exit(); //Detiene la ejecución del script
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>
    <form method="post" action="editar.php">
        <input type="hidden" name="id" value="<?php echo $lista[0]['id']; ?>"> <!-- Campo oculto para el id -->
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" value="<?php echo $lista[0]['nombre']; ?>"><br><br>

        <label for="precio">Precio:</label><br>
        <input type="number" step="0.01" id="precio" name="precio" value="<?php echo $lista[0]['precio']; ?>"><br><br>
        
        <label for="stock">Stock:</label><br>
        <input type="number" id="stock" name="stock" value="<?php echo $lista[0]['stock']; ?>" required><br><br>

        <input type="submit" name="actualizar" value="Actualizar Datos">
    </form>
    <a href="index.php">Volver al listado</a>
</body>
</html>