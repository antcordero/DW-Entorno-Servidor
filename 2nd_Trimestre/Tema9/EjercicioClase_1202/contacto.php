<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

$mensaje = "";
if (isset($_POST['enviar'])) {
    $mensaje = "¡Gracias " . $_SESSION['usuario'] . "! Hemos recibido tu consulta.";
}

include 'menu.php';
?>

<h1>Formulario de Contacto</h1>

<?php if ($mensaje): ?>
    <div class="alerta-verde"><?php echo $mensaje; ?></div>
<?php endif; ?>

<form action="contacto.php" method="POST">
    <label>Asunto:</label><br>
    <input type="text" name="asunto" required style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>

    <label>Mensaje:</label><br>
    <textarea name="texto" rows="5" required style="width: 100%; padding: 8px; margin-bottom: 10px;"></textarea><br>

    <input type="submit" name="enviar" value="Enviar Mensaje" class="btn">
</form>

</div>
</body>
</html>