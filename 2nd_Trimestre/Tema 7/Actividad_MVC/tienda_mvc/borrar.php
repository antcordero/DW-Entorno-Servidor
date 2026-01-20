<?php
    include "dbTienda.php";
    $tienda = new dbTienda();

    if(isset($_GET['id'])) {
        $id_producto = $_GET['id']; //Obtener el id del producto a borrar
        $tienda->borrarProducto($id_producto); //Llamar a la función para borrar el producto

        header("Location: index.php"); //Redirige al listado
        exit(); //Detiene la ejecución del script

    } else {
        header("Location: index.php"); //Redirige al listado si no hay id
        exit(); //Detiene la ejecución del scripts
    }
?>