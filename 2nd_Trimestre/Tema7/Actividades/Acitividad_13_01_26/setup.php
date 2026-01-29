<?php
// Configuración de conexión a la base de datos
$host = "localhost";
$username = "root";
$password = "";
try {
    // Crear conexión a la base de datos usando PDO
    $pdo = new PDO("mysql:host=$host;", $username, $password);
    // Configurar modo de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa.";
    // Eliminar base de datos si existe
    $pdo->exec("DROP DATABASE IF EXISTS biblioteca");
    echo "Base de datos antigua eliminada si exste.<br>";
    // Crear nueva base de datos
    $sqlDB = "CREATE DATABASE biblioteca
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci";
    $pdo->exec($sqlDB);
    echo "Base de datos 'biblioteca' creada correctamente.<br>";
    // Seleccionar la base de datos
    $pdo->exec("USE biblioteca");
    $sqlTable = "CREATE TABLE autores (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL,
        nacionalidad VARCHAR(50) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB;";
    $pdo->exec($sqlTable);
    echo "Tabla 'autores' creada correctamente.<br>";
    // Preparar inserción de datos con sentencia preparada
    $insertStmt = $pdo->prepare("INSERT INTO autores (nombre, nacionalidad) VALUES (?, ?)");
    $autores = [
        ['Francisco Vargas', 'Nigeriana'],
        ['Isabel Allende', 'Peruana'],
        ['Mario Vargas Llosa', 'Panameña'],
        ['Jorge Luis Borges', 'Argentina'],
        ['Francisco Franco', 'Española']
    ];
    // Ejecutar inserción de múltiples autores
    foreach ($autores as $autor) {
        $insertStmt->execute($autor);
    }
    echo "Datos insertados correctamente en la tabla 'autores'.<br>";
    // Crear tabla de libros
    $createTableLibros = "CREATE TABLE libros (
        id INT AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(100) NOT NULL,
        autor_id INT,
        publicado_en YEAR,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (autor_id) REFERENCES autores(id) ON DELETE SET NULL
    ) ENGINE=InnoDB;";
    $pdo->exec($createTableLibros);
    echo "Tabla 'libros' creada correctamente.<br>";
    // Eliminar tabla de libros
    $dropTableLibros = "DROP TABLE IF EXISTS libros";
    ;
    $pdo->exec($dropTableLibros);
    echo "Tabla 'libros' eliminada correctamente.<br>";
 
    // Eliminar todos los datos y reiniciar IDs desde 0
    $truncateAutores = "TRUNCATE TABLE autores";
    $pdo->exec($truncateAutores);
    echo "Datos de la tabla 'autores' eliminados e IDs reiniciados desde 0.<br>";
 
    // Capturar y mostrar errores de conexión
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
 
    // Verificar tipo de error
    if (strpos($e->getMessage(), 'Connection refused') !== false) {
        echo "<br>Verifique que el servidor MySQL está corriendo.";
    } elseif (strpos($e->getMessage(), 'Access denied for user') !== false) {
        echo "<br>Verifique que el usuario '$username' y la contraseña son correctos.";
    }
}
?>
 