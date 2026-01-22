<?php
/**
 * ARCHIVO DE CONFIGURACIÓN
 * Define las constantes globales para la conexión.
 * Ventaja: Si cambias la contraseña, solo la cambias aquí.
 * Este código os sirve para hacer ctrl+c y ctrl+v para otros
 * códigos cambiando solo DB_NAME y donde se encuentre el Host
 * ⚠️ tened cuidado con el define('MONEDA',...) es para la tienda
 * en este caso.
 */

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'concesionario');
define('MONEDA', '€'); // Configuración extra para la tienda
?>