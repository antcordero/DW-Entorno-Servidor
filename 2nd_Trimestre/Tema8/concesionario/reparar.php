<?php
// 1. Cargamos configuración
require_once 'config/db_conf.php';

// 2. Conectamos
$conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// 3. Generamos la contraseña '1234' fresca y correcta para TU servidor
$pass_texto_plano = '1234';
$hash_nuevo = password_hash($pass_texto_plano, PASSWORD_BCRYPT);

// 4. Actualizamos la base de datos (asegúrate que el email coincide con el que tienes)
$email_admin = 'admin@motorpro.com'; 

$sql = "UPDATE usuarios SET password = '$hash_nuevo' WHERE email = '$email_admin'";

if ($conexion->query($sql)) {
    echo "<h1>✅ ¡Arreglado!</h1>";
    echo "<p>Hemos forzado la actualización de la contraseña.</p>";
    echo "<ul>";
    echo "<li><b>Email:</b> $email_admin</li>";
    echo "<li><b>Contraseña:</b> 1234</li>";
    echo "<li><b>Nuevo Hash generado:</b> $hash_nuevo</li>";
    echo "</ul>";
    echo "<br><a href='index.php?seccion=login'>👉 PRUEBA A ENTRAR AHORA</a>";
} else {
    echo "<h1>❌ Error</h1>";
    echo "<p>No se pudo actualizar: " . $conexion->error . "</p>";
    echo "<p>Comprueba que el email '$email_admin' existe realmente en tu tabla usuarios.</p>";
}
?>