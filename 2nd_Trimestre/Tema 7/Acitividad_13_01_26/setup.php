<?php
$host = 'localhost:3306';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<div>Conexión al servidor exitosa</div><br>";
    
    $pdo->exec("DROP DATABASE IF EXISTS biblioteca");
    
    echo "<div>Base de datos antigua eliminada</div><br>";
    
    $sqlDB = "CREATE DATABASE biblioteca
              CHARACTER SET utf8mb4
              COLLATE utf8mb4_unicode_ci";
    
    $pdo->exec($sqlDB);
    
    echo "<div> Base de datos creada con éxito </div><br>";
    
    $pdo->exec("USE biblioteca");
    
    $sqlAutores = "CREATE TABLE autores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    nacionalidad VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB";

    $pdo->exec($sqlAutores);
    echo "<div> Tabla 'autores' creada con éxito </div><br>";

    //Insertar datos en la tabla
    //Crear una nueva tabla
    //Eliminar la tabla
    //Eliminar datos de la tabla restaurando ID desde 0

} catch (PDOException $e) {
    echo "<br><div> 'error'</div>";
    echo "<div>" . $e->getMessage() . "</div>";

    if (strpos($e->getMessage(), 'Connection refused') !== false) {
        echo "<br><div> 'revisa el puerto que tienes en el equipo'</div>";
    }

    if (strpos($e->getMessage(), 'Access denied') !== false) {
        echo "<div class='info'>PISTA: Revisa usuario/contrasefa en el archivo setup.php .</div>";
    }
    
}
?>