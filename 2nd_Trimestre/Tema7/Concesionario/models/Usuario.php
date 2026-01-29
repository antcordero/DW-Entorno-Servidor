<?php
require_once 'Db.php';

class Usuario extends Db {
    
    function __construct() {
        parent::__construct();
    }

    /**
     * Verifica si el usuario y contraseña son correctos
     */
    public function login($email, $password) {
        $emailLimpio = $this->escapar($email);
        
        // Buscamos al usuario por email
        $sql = "SELECT * FROM usuarios WHERE email = '$emailLimpio'";
        $resultado = $this->consulta($sql);

        if ($resultado && $resultado->num_rows == 1) {
            $usuario = $resultado->fetch_assoc();
            
            // Verificamos la contraseña encriptada (Hash)
            if (password_verify($password, $usuario['password'])) {
                return $usuario; // ¡Login correcto! Devolvemos los datos
            }
        }
        return false; // Login fallido
    }

    /**
     * Obtener todos los usuarios (Solo para el Admin)
     */
    public function getTodos() {
        $sql = "SELECT * FROM usuarios";
        $res = $this->consulta($sql);
        $usuarios = [];
        while($row = $res->fetch_assoc()) $usuarios[] = $row;
        return $usuarios;
    }

    /**
     * Crear nuevo usuario (Con contraseña encriptada)
     */
    public function crear($nombre, $email, $password, $rol) {
        $n = $this->escapar($nombre);
        $e = $this->escapar($email);
        $r = $this->escapar($rol);
        // Encriptamos la contraseña antes de guardarla
        $p = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO usuarios (nombre, email, password, rol) VALUES ('$n', '$e', '$p', '$r')";
        return $this->consulta($sql);
    }

    public function borrar($id) {
        $sql = "DELETE FROM usuarios WHERE id = " . (int)$id;
        return $this->consulta($sql);
    }
}
?>