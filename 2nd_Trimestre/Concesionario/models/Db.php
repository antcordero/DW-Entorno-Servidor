<?php
    //Añadir toda la configuración de la base de datos
    require_once __DIR__ . '/../config/db_conf.php';

    class Db {
        //variable únicamente para los hijos de la clase y la propia clase
        protected $conexion;
        public $mensaje_error = "";
        public $error = false;

        //Constructor de la clase Db que conecta a la base de datos usando PDO
        function __construct() {
            $this->conexion = @new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if ($this->conexion->connect_errno) {
                $this->error=true;
                $this->mensaje_error = "Error de conexión a la base de datos: " . $this->conexion->connect_error;
            } else {
                $this->conexion->set_charset("utf8mb4");
            }
        }

        //Para consultas en SQL, le pasa la consulta que tengamos
        public function consulta($sql) {
            if ($this->error) {
                return false;
            } else {
                $resultado = $this->conexion->query($sql);
            }

            if (!$resultado) {
                $this->mensaje_error = "Error SQL: " . $this->conexion->error;
                return null;
            } else {
                return $resultado;
            }
        }

        public function escapar($dato) {
            return $this->conexion->real_escape_string($dato);
        }
    }    
?>