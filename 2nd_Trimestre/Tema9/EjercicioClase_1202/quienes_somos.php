<?php
session_start();
// SEGURIDAD: Si no hay usuario, fuera.
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
include 'menu.php';
?>

<h1>Quiénes Somos</h1>
<p>Bienvenidos a nuestra sección corporativa.</p>

<div style="display: flex; gap: 20px; align-items: center;">
    <div style="flex: 1;">
        <img src="https://img.static-rmg.be/a/view/q75/w2400/h1256/f29.86,38.44/4754194/teletubbies-jpg.jpg" alt="Oficina" style="width: 100%; border-radius: 5px;">
    </div>
    <div style="flex: 2;">
        <h3>Nuestra Historia</h3>
        <p>Somos una empresa ficticia creada para el módulo de Desarrollo Web en Entorno Servidor (Cesur).</p>
        <p>Nuestro objetivo es demostrar el funcionamiento de las <strong>Sesiones PHP</strong> y la autenticación segura contra base de datos MySQL.</p>
    </div>
</div>
    
</div>
</body>
</html>