<?php
require_once __DIR__ . '/controllers/JugadorController.php';
$controller = new JugadorController();
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'crear':
        $controller->crear();
        break;

    case 'guardar':
        $controller->guardar();
        break;

    case 'editar':
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $controller->editar($id);
        break;

    case 'actualizar':
        $controller->actualizar();
        break;

    case 'eliminar':
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $controller->eliminar($id);
        break;

    default:
        $controller->index();
        break;
}
