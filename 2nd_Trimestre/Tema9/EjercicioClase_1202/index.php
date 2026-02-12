<?php
session_start();
require 'db.php'; 

$mensaje_error = "";

// LÓGICA DE LOGIN
if (isset($_POST['btn_login'])) {
    $identificador = $conexion->real_escape_string($_POST['identificador']);
    $password_plano = $_POST['password'];
    $password_hash = md5($password_plano); // MD5 según el ejercicio

    // SQL con OR para Usuario o Email
    $sql = "SELECT * FROM usuarios 
            WHERE (usuario = '$identificador' OR email = '$identificador') 
            AND password = '$password_hash'";
    
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $_SESSION['usuario'] = $fila['usuario'];
        $_SESSION['ultima_visita'] = $fila['ultima_visita'];
        $conexion->query("UPDATE usuarios SET ultima_visita = NOW() WHERE id = " . $fila['id']);
        
        header("Location: index.php"); // Recargamos para mostrar bienvenida
        exit();
    } else {
        $mensaje_error = "Usuario o contraseña incorrectos.";
    }
}

// Incluimos el diseño
include 'menu.php'; 
?>

    <?php if (isset($_SESSION['usuario'])): ?>
        <center>
            <h1>Bienvenido al Panel de Gestión</h1>
            <p>Hola <strong><?php echo $_SESSION['usuario']; ?></strong>.</p>
            <p>Tu última visita fue el: 
                <strong>
                <?php 
                    $fecha = strtotime($_SESSION['ultima_visita']);
                    echo date("d/m/Y", $fecha) . " a las " . date("H:i", $fecha); 
                ?>
                </strong>
            </p>
            <hr>
          
        </center>

    <?php else: ?>
        <h1>Acceso Restringido</h1>
        <p>Por favor, identifícate para ver el contenido de la web.</p>
        
        <?php if($mensaje_error): ?>
            <p class="error"><?php echo $mensaje_error; ?></p>
        <?php endif; ?>

        <form action="index.php" method="POST" style="max-width: 400px; margin: auto;">
            <label>Usuario o Email:</label>
            <input type="text" name="identificador" required style="width: 100%; padding: 8px; margin-bottom: 10px;">

            <label>Contraseña:</label>
            <input type="password" name="password" required style="width: 100%; padding: 8px; margin-bottom: 10px;">

            <input type="submit" name="btn_login" value="Acceder" class="btn" style="width: 100%;">
        </form>
    <?php endif; ?>

</div> </body>
</html>