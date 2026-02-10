<?php
session_start();    //Siempre la primera línea del código

//Comprobamos si el usuario ya envió el formulario, que esté logeado
if ($_POST) {
    $usuario_valido="admin";
    $pass_valida="1234";
    $user = $_POST['usuario'];
    $pass = $_POST['password'];

    //Verificamos las credenciales
    if ($user === $usuario_valido && $pass === $pass_valida) {
        //guardamos el nombre en la sesion
        $_SESSION['nombre_usuario'] = $user;
        $_SESSION['rol'] = "VIP";
        //Redirigimos a la web de VIP
        header("Location: vip.php");
        exit();
    } else {
        //Si no son correctas, mostramos un mensaje de error
        $error = "Usuario o contraseña incorrectos";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
            margin-top: 50px;
        }

        .error {
            color: red;
        }
        .login-card {
            border: 1px solid #ccc;
            padding: 20px;
            display: inline-block;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .input {
            padding: 10px;
            margin: 10px 0;
            width: 100%;
            box-sizing: border-box;
        }
        .btn {
            padding: 10px 20px;
            background-color: #3498db;;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h2>Acceso Socios</h2>
        <?php if (isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
        <form method="POST">
            <input type="text" name="usuario" placeholder="Usuario" class="input" required>
            <input type="password" name="password" placeholder="Contraseña" class="input" required>
            <button type="submit" class="btn">Iniciar sesión</button>
        </form>
        <a href="index.php">Volver al inicio</a>
    </div>
</body>
</html>