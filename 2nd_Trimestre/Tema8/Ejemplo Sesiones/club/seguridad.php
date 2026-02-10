<?php
//Clase seguridad.php
class seguridad {
    private $usuario = null;

    public function __construct() {
        if (session_start()==PHP_SESSION_NONE) {
            session_start();
        };
        //usuario de la super global
        if (isset($_SESSION["usuario"])) {
            $this->usuario=$_SESSION["usuario"];
        }
    }
    public function getUsusario($user) {
        return $this->usuario;
    }

    public function setUsuario($user) {
        $_SESSION["usuario"] = $user;
        $this->usuario = $user;
    }

    public function logOut() {
        session_unset();
        session_destroy();
        $this->usuario = null;
    }
}


?>