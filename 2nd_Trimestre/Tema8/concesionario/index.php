<?php
// =======================================================
// 0. CHIVATO DE ERRORES (Solo para desarrollo)
// =======================================================
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// 1. INICIAR SESIÓN
session_start();


// 2. CARGA DE DEPENDENCIAS
require_once __DIR__ . '/config/db_conf.php';
require_once __DIR__ . '/helpers/Util.php';
require_once __DIR__ . '/models/Coche.php';
require_once __DIR__ . '/models/Taller.php';
require_once __DIR__ . '/models/Empleado.php';
require_once __DIR__ . '/models/Usuario.php';
require_once __DIR__ . '/models/Pieza.php';


// 3. LÓGICA DE LOGIN / LOGOUT
$seccion = isset($_GET['seccion']) ? $_GET['seccion'] : 'dashboard';

if ($seccion == 'login') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuarioModel = new Usuario();
        $login = $usuarioModel->login($_POST['email'], $_POST['password']);
        
        if ($login) {
            $_SESSION['usuario'] = $login;
            header("Location: index.php");
            exit();
        } else {
            $error = "Usuario o contraseña incorrectos.";
            include 'views/auth/login.php';
            exit();
        }
    }
}

if ($seccion == 'logout') {
    session_destroy();
    header("Location: index.php");
    exit();
}

// 4. BARRERA DE SEGURIDAD
if (!isset($_SESSION['usuario'])) {
    include 'views/auth/login.php';
    exit();
}

// =======================================================
// ZONA PRIVADA
// =======================================================

include 'views/layouts/header.php';

switch ($seccion) {

    // --- ADMIN: USUARIOS ---
    case 'admin_usuarios':
        if ($_SESSION['usuario']['rol'] != 'admin') die("Acceso Denegado");
        $uModel = new Usuario();
        $usuarios = $uModel->getTodos();
        include 'views/admin/gestion_usuarios.php';
        break;

    case 'crear_usuario':
        if ($_SESSION['usuario']['rol'] != 'admin') die("Acceso Denegado");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $uModel = new Usuario();
            $uModel->crear($_POST['nombre'], $_POST['email'], $_POST['password'], $_POST['rol']);
            echo "<script>window.location='index.php?seccion=admin_usuarios';</script>";
        }
        break;

    case 'borrar_usuario':
        if ($_SESSION['usuario']['rol'] != 'admin') die("Acceso Denegado");
        if (isset($_GET['id'])) {
            $uModel = new Usuario();
            $uModel->borrar($_GET['id']);
        }
        echo "<script>window.location='index.php?seccion=admin_usuarios';</script>";
        break;


    // --- RRHH: EMPLEADOS ---
    case 'empleados':
        $rrhh = new Empleado();
        $listaEmpleados = $rrhh->getTodos();
        $gastoTotal = $rrhh->getGastoTotalSueldos();
        include 'views/empleados/equipo.php';
        break;

    case 'crear_empleado':
        if ($_SESSION['usuario']['rol'] != 'admin') die("Acceso Denegado");
        include 'views/empleados/crear.php';
        break;

    case 'guardar_empleado':
        if ($_SESSION['usuario']['rol'] != 'admin') die("Acceso Denegado");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $rrhh = new Empleado();
            $rrhh->insertar($_POST['nombre'], $_POST['cargo'], $_POST['email'], $_POST['sueldo']);
            echo "<script>window.location='index.php?seccion=empleados';</script>";
        }
        break;

    case 'borrar_empleado':
        if ($_SESSION['usuario']['rol'] != 'admin') die("Acceso Denegado");
        echo "<script>window.location='index.php?seccion=empleados';</script>";
        break;


    // --- TALLER ---
    case 'taller':
        $taller = new Taller();
        $listaCitas = $taller->getCitasActivas();
        if (file_exists('views/taller/dashboard_taller.php')) {
            include 'views/taller/dashboard_taller.php';
        } else {
            include 'views/taller/dashboard.php'; 
        }
        break;


    // --- ALMACÉN: PIEZAS / RECAMBIOS ---
    case 'piezas':
        $almacen = new Pieza();
        $listaPiezas = $almacen->getTodos();
        include 'views/piezas/listado.php';
        break;

    case 'crear_pieza':
        include 'views/piezas/crear.php';
        break;

    case 'guardar_pieza':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $almacen = new Pieza();
            $almacen->crear(
                $_POST['nombre'],
                $_POST['referencia'],
                $_POST['precio'],
                $_POST['stock'],
                $_POST['ubicacion']
            );
        }
        echo "<script>window.location='index.php?seccion=piezas';</script>";
        break;

    case 'editar_pieza':
        if (!isset($_GET['id'])) {
            echo "<script>window.location='index.php?seccion=piezas';</script>";
            break;
        }
        $almacen = new Pieza();
        $pieza = $almacen->getById($_GET['id']);
        if (!$pieza) {
            echo "<script>window.location='index.php?seccion=piezas';</script>";
            break;
        }
        include 'views/piezas/editar.php';
        break;

    case 'actualizar_pieza':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $almacen = new Pieza();
            $almacen->actualizar(
                $_POST['id'],
                $_POST['nombre'],
                $_POST['referencia'],
                $_POST['precio'],
                $_POST['stock'],
                $_POST['ubicacion']
            );
        }
        echo "<script>window.location='index.php?seccion=piezas';</script>";
        break;

    case 'borrar_pieza':
        if (isset($_GET['id'])) {
            $almacen = new Pieza();
            $almacen->borrar($_GET['id']);
        }
        echo "<script>window.location='index.php?seccion=piezas';</script>";
        break;


    // --- COCHES ---
    case 'coches':
        $ventas = new Coche();
        $listaCoches = $ventas->getTodos();
        include 'views/coches/listado.php';
        break;

    case 'detalle_coche':
        if (!isset($_GET['id'])) {
            echo "<script>window.location='index.php?seccion=coches';</script>";
            break;
        }
        $ventas = new Coche();
        $coche = $ventas->getById($_GET['id']);
        if (!$coche) {
            echo "<script>window.location='index.php?seccion=coches';</script>";
            break;
        }
        include 'views/coches/detalle.php';
        break;

    case 'marcar_vendido':
        if (isset($_GET['id'])) {
            $ventas = new Coche();
            $ventas->marcarVendido($_GET['id']);
        }
        echo "<script>window.location='index.php?seccion=coches';</script>";
        break;


    // --- DASHBOARD ---
    case 'dashboard':
    default:
        $modeloCoches = new Coche();
        $modeloTaller = new Taller();
        $modeloRRHH = new Empleado();
        
        $totalCoches = count($modeloCoches->getTodos());
        $vipCoches = count($modeloCoches->getDestacados());
        $citasPendientes = count($modeloTaller->getCitasActivas());
        $totalEmpleados = count($modeloRRHH->getTodos());
        
        include 'views/dashboard/main.php';
        break;
}

include 'views/layouts/footer.php';
