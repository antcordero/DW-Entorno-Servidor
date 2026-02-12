<?php
session_start();
//Comprobamos si el usuario es VIP
if (!isset($_SESSION['nombre_usuario'])) {
    //Si no es VIP, lo redirigimos al index
    header("Location: login.php");
    exit();
}

//contador de visitas
if (!isset($_SESSION['visitas'])) {
    $_SESSION['visitas'] = 0;
} else {
    $_SESSION['visitas']++;
}

$_SESSION['nombre_usuario'];
$_SESSION['rol'];
$visitas = $_SESSION['visitas'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club - VIP</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        .card {
            border: 1px solid #ccc;
            padding: 20px;
            display: inline-block;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .logout {
            padding: 10px 20px;
            background-color: #e74c3c;;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>VIP</h1>
    <div class="card"></div>
        <p>Bienvenido, <?php echo $_SESSION['nombre_usuario']; ?>. Eres un socio VIP.</p>
        <p>Tu estatus en el servidor es: <span style="color: gold; background-color: black; padding: 2px 5px;"><?php echo $_SESSION['rol']; ?></span></p>
        <hr>
        <p>Esta información es secreta y solo la puede ver el usuario VIP.</p>
        <br>
        <a href="logout.php" class="logout">Cerrar sesión</a>
        
    </div>
    <!-- Contador de visitas -->
    <p>Has visitado esta página <?php echo $visitas; ?> veces en esta sesión.</p>
    </body>
</html>