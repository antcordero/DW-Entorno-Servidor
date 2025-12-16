<?php

    $servidor = "localhost";
    $usuario  = "root";
    $password = "";
    $basedatos = "empleados";

    $conexion = new mysqli($servidor, $usuario, $password, $basedatos);
    
    if ($conexion->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
        exit();
    }
    
    $conexion->set_charset("utf8");
    
    $sql = "SELECT * FROM empleados";
    
    $resultado = $conexion->query($sql);
 
?>
 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Usuarios</title>
    <style>
        table { border-collapse: collapse; width: 50%; margin: 20px auto; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
 
<h2 style="text-align:center;">👥 Usuarios Registrados</h2>
 
<?php
    if ($resultado->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>Cargo</th><th>Email</th></tr>";
    
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila['id'] . "</td>";
            echo "<td>" . $fila['nombre'] . "</td>";
            echo "<td>" . $fila['apellidos'] . "</td>";
            echo "<td>" . $fila['cargo'] . "</td>";
            echo "<td>" . $fila['email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='text-align:center'>No hay usuarios en la base de datos.</p>";
    }
    
    $conexion->close();
?>
 
</body>
</html>