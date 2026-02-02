<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Motor Pro</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Estilo específico para centrar el login en la pantalla */
        body { display: flex; align-items: center; justify-content: center; background: #2c3e50; }
        .login-box { background: white; padding: 40px; border-radius: 10px; width: 100%; max-width: 400px; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.2); }
        .logo-login { font-size: 3rem; color: #3498db; margin-bottom: 20px; }
        .error-msg { background: #e74c3c; color: white; padding: 10px; border-radius: 5px; margin-bottom: 20px; font-size: 0.9rem; }
    </style>
</head>
<body>

    <div class="login-box">
        <div class="logo-login">
            <i class="fa-solid fa-car-side"></i>
        </div>
        <h2>Acceso Motor Pro</h2>
        <p style="color:#777; margin-bottom:30px;">Introduce tus credenciales</p>

        <?php if(isset($error)): ?>
            <div class="error-msg"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="index.php?seccion=login" method="POST">
            <div class="form-group">
                <input type="email" name="email" required placeholder="Correo electrónico" style="text-align:center">
            </div>
            <div class="form-group">
                <input type="password" name="password" required placeholder="Contraseña" style="text-align:center">
            </div>
            <button type="submit" class="btn-primary" style="width:100%; margin-top:10px;">Entrar al Sistema</button>
        </form>
        
        <p style="margin-top:20px; font-size:0.8rem; color:#aaa;">
            Prueba: admin@motorpro.com / 1234
        </p>
    </div>

</body>
</html>