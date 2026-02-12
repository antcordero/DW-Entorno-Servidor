<?php
// Averiguamos en qué página estamos para marcar la pestaña activa
$pagina_actual = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Web Profesional PHP</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f4f4; margin: 0; }
        
        /* ESTILOS DEL MENÚ (TABS) */
        .tabs { overflow: hidden; background-color: #333; }
        .tabs a { float: left; display: block; color: white; text-align: center; padding: 14px 16px; text-decoration: none; transition: 0.3s; }
        .tabs a:hover { background-color: #ddd; color: black; }
        
        /* Clase para resaltar la pestaña activa */
        .tabs a.active { background-color: #5b9bd5; color: white; font-weight: bold; }
        
        /* CONTENEDOR PRINCIPAL */
        .contenedor { width: 80%; max-width: 800px; margin: 40px auto; background: white; padding: 30px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); border-radius: 5px; }
        
        /* ESTILOS GENERALES */
        h1, h2 { color: #333; border-bottom: 2px solid #5b9bd5; padding-bottom: 10px; }
        .usuario-info { float: right; color: #ccc; padding: 14px; font-size: 0.9em; }
        
        .btn { background-color: #5b9bd5; color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 4px; text-decoration: none; display: inline-block;}
        .btn:hover { background-color: #4a8ad4; }
        
        .error { color: red; text-align: center; }
        .alerta-verde { background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; text-align: center;}
        
        /* Estilos para listas y tablas */
        ul { list-style-type: none; padding: 0; }
        li { padding: 8px; border-bottom: 1px solid #eee; }
    </style>
</head>
<body>

<div class="tabs">
    <a href="index.php" class="<?php echo ($pagina_actual == 'index.php') ? 'active' : ''; ?>">Inicio</a>

    <?php if (isset($_SESSION['usuario'])): ?>
        <a href="quienes_somos.php" class="<?php echo ($pagina_actual == 'quienes_somos.php') ? 'active' : ''; ?>">Quiénes Somos</a>
        <a href="servicios.php" class="<?php echo ($pagina_actual == 'servicios.php') ? 'active' : ''; ?>">Servicios</a>
        <a href="contacto.php" class="<?php echo ($pagina_actual == 'contacto.php') ? 'active' : ''; ?>">Contacto</a>
        
        <a href="asistencia.php" class="<?php echo ($pagina_actual == 'asistencia.php') ? 'active' : ''; ?>">Mis Asistencias </a>
        
        <a href="logout.php" style="float: right; background-color: #d9534f;">Salir</a>
        <div class="usuario-info">Hola, <?php echo $_SESSION['usuario']; ?></div>
    <?php endif; ?>
</div>

<div class="contenedor">