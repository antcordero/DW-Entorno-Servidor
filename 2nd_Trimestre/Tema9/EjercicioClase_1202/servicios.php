<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
include 'menu.php';
?>

<h1>Nuestros Servicios</h1>
<p>Estos son los servicios exclusivos para usuarios registrados:</p>

<ul>
    <li>
        <h3>Desarrollo Backend</h3>
        <p>Creación de APIs, conexiones a bases de datos y lógica de servidor con PHP.</p>
    </li>
    <li>
        <h3>Seguridad Informática</h3>
        <p>Implementación de algoritmos de hashing (MD5, SHA) y protección contra inyecciones SQL.</p>
    </li>
    <li>
        <h3>Gestión de Bases de Datos</h3>
        <p>Diseño de tablas relacionales y optimización de consultas SQL.</p>
    </li>
</ul>

</div>
</body>
</html>