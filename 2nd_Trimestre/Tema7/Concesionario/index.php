<?php
// 1. INICIAR SESIÓN (IMPORTANTE: Siempre en la primera línea)
session_start();

// 2. CARGA DE DEPENDENCIAS
require_once 'config/db_conf.php';
require_once 'helpers/Util.php';
require_once 'models/Coche.php';
require_once 'models/Taller.php';
require_once 'models/Empleado.php';
require_once 'models/Usuario.php'; 

// 3. LÓGICA DE LOGIN / LOGOUT
$seccion = isset($_GET['seccion']) ? $_GET['seccion'] : 'dashboard';

// -- ACCIÓN DE LOGIN --
if ($seccion == 'login') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuarioModel = new Usuario();
        $login = $usuarioModel->login($_POST['email'], $_POST['password']);
        
        if ($login) {
            $_SESSION['usuario'] = $login; // Guardamos al usuario en la sesión
            header("Location: index.php"); // Recargamos para entrar
            exit();
        } else {
            $error = "Usuario o contraseña incorrectos.";
            include 'views/auth/login.php'; // Volvemos a mostrar login con error
            exit();
        }
    }
}

// -- ACCIÓN DE LOGOUT --
if ($seccion == 'logout') {
    session_destroy();
    header("Location: index.php");
    exit();
}

// 4. BARRERA DE SEGURIDAD
// Si NO existe la variable de sesión, mostramos el Login y MATAMOS el script aquí.
if (!isset($_SESSION['usuario'])) {
    include 'views/auth/login.php';
    exit(); // Importante: que no se cargue nada más
}

// =======================================================
// SI LLEGAMOS AQUÍ, ES QUE EL USUARIO ESTÁ LOGUEADO
// =======================================================

// 5. INICIO DE HTML COMÚN
include 'views/layouts/header.php';

// 6. CONTROLADOR DE VISTAS
switch ($seccion) {
    
    // --- GESTIÓN DE USUARIOS (SOLO ADMIN) ---
    case 'admin_usuarios':
        if ($_SESSION['usuario']['rol'] != 'admin') { die("Acceso Denegado"); }
        $uModel = new Usuario();
        $usuarios = $uModel->getTodos();
        include 'views/admin/gestion_usuarios.php';
        break;

    case 'crear_usuario':
        if ($_SESSION['usuario']['rol'] != 'admin') { die("Acceso Denegado"); }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $uModel = new Usuario();
            $uModel->crear($_POST['nombre'], $_POST['email'], $_POST['password'], $_POST['rol']);
            echo "<script>window.location='index.php?seccion=admin_usuarios';</script>";
        }
        break;

    case 'borrar_usuario':
        if ($_SESSION['usuario']['rol'] != 'admin') { 
        die("ACCESO DENEGADO: Intento de violación de seguridad."); 
    }
        if (isset($_GET['id'])) {
            $uModel = new Usuario();
            $uModel->borrar($_GET['id']);
            echo "<script>window.location='index.php?seccion=admin_usuarios';</script>";
        }
        break;

    // --- RESTO DE SECCIONES (YA EXISTENTES) ---
    case 'empleados':
        $rrhh = new Empleado();
        $listaEmpleados = $rrhh->getTodos();
        $gastoTotal = $rrhh->getGastoTotalSueldos();
        include 'views/empleados/equipo.php';
        break;

    case 'crear_empleado':
        include 'views/empleados/crear.php';
        break;

    case 'guardar_empleado':
        if ($_SESSION['usuario']['rol'] != 'admin') { die("Acceso Denegado."); }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $rrhh = new Empleado();
            $rrhh->insertar($_POST['nombre'], $_POST['cargo'], $_POST['email'], $_POST['sueldo']);
            echo "<script>window.location='index.php?seccion=empleados';</script>";
        }
        break;

    case 'taller':
        $taller = new Taller();
        $listaCitas = $taller->getCitasActivas();
        include 'views/taller/dashboard_taller.php';
        break;

    case 'coches':
        $ventas = new Coche();
        $listaCoches = $ventas->getTodos();
        include 'views/coches/listado.php';
        break;

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

// 7. CIERRE DE HTML
include 'views/layouts/footer.php';
?>