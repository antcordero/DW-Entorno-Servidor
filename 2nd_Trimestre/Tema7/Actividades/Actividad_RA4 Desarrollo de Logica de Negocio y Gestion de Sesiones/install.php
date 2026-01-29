<?php
$host = 'localhost';
$user = 'root';
$pass = '';

try {

    /**
     *  EJERCICIO 1 - Conexión e Idempotencia (Configuración del Servidor)
     */
    //Crear conexion a la base de datos
    $pdo = new PDO("mysql:host=$host;", $user, $pass);

    //configigurar el modo de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexion exitosa.<br>";

    //Eliminar base de datos si existe
    $pdo->exec("DROP DATABASE IF EXISTS pettinder_db");
    echo "Base de datos antigua eliminada si existe.<br>";

    //Crear nueva base de datos+
    $sqlDB = "CREATE DATABASE pettinder_db
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci";
    $pdo->exec($sqlDB);
    echo "Base de datos 'pettinder_db' creada correctamente.<br>";

    /*
     *   EJERCICIO 2 - Arquitectura de Datos (DDL)
     */
    //Seleccionar la base de datos
    $pdo->exec("USE pettinder_db");
    $sqlTAble = "CREATE TABLE mascotas (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL,
        bio VARCHAR(250) NOT NULL,
        likes INT NOT NULL DEFAULT 0
    ) ENGINE=InnoDB;";
    $pdo->exec($sqlTAble);
    echo "Tabla 'mascotas' creada correctamente.<br>"; 

    /**
     *  EJERCICIO 3 - Seeding y Seguridad (DML)
     */
    //Para que la base de datos no nazca vacía, insertar dos datos de prueba
    $insertStmt = $pdo->prepare("INSERT INTO mascotas (nombre, bio, likes) VALUES (?, ?, ?)");
    $mascotas = [
        ['Firulais', 'Perro jugueton que ama las pelotas.', 10],
        ['Michi', 'Gato curioso que le gusta explorar.', 15]
    ];

    //cargar mascotas de prueba en la base de datos
    foreach ($mascotas as $m) {
        $insertStmt->execute($m);
    }
    echo "Datos insertados correctamente en la base de datos";

    /**
     *  EJERCICIO 4 - Ingeniería de Datos Avanzada (Relaciones N:M)
     */
    

} catch (PDOException $excepcion) {
    echo "Error: " . $excepcion->getMessage();

    //verificar que el usuario tiene permisos de creacion
    if (strpos($excepcion->getMessage(), 'CREATE') !== false) {
        echo "<br>Verifique que el usuario '$user' tiene permisos de creacion (CREATE/INSERT).";
    } else if (strpos($excepcion->getMessage(), 'DROP') !== false) {
        echo "<br>Verifique que el usuario '$user' tiene permisos de eliminacion (DROP).";
    } else {
        echo "<br>Verifique que el usuario '$user' tiene los permisos necesarios.";
    }
}

?>