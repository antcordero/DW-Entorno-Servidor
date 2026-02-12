<?php
session_start();

$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "Invitado";

// Registrar la fecha y hora de la última visita
date_default_timezone_set('Europe/Madrid'); // Ajusta la zona horaria si es necesario
$fecha_actual = date("d/m/Y H:i:s");

if (isset($_SESSION['ultima_visita'])) {
    $ultima_visita = $_SESSION['ultima_visita'];
} else {
    $ultima_visita = "Primera visita";
}

// Guardar la nueva fecha de visita en la sesión
$_SESSION['ultima_visita'] = $fecha_actual;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Recogida de información</title>
    <style>
      body { 
        font-family: sans-serif; 
        text-align: center; 
        margin-top: 50px; 
      }
      .btn {
        padding: 10px 20px;
        margin: 10px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
      }
      .container { 
        display: inline-block; 
        padding: 25px; 
        border: 1px solid #ccc; 
        border-radius: 8px; 
        background: #f8f8f8; 
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h2>Bienvenido/a, <?php echo htmlspecialchars($nombre); ?>!</h2>
      <p>La última visita fue: <strong><?php echo $ultima_visita; ?></strong></p>
      <form method="post" action="">
        <input type="hidden" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>">
        <button type="submit" class="btn">Acceder</button>
        <a href="index_1202.php" class="btn">Salir</a>
      </form>
    </div>
  </body>
</html>