<?php
// Importamos la configuración. 
// Usamos 'require_once' porque si falta la config, la web debe fallar (es crítico).
require_once __DIR__ . '/../config/db_conf.php';

/**
 * CLASE PADRE: Db
 * Gestiona la conexión a MySQL usando MySQLi.
 * Todas las clases del ERP (Coches, Empleados...) heredarán de aquí.
 */
class Db {
    
    // PROTECTED: Solo yo y mis hijos (clases que heredan) pueden ver esta variable.
    // Desde fuera (index.php) no se puede tocar la conexión directamente.
    protected $conexion;
    
    public $error = false;
    public $mensaje_error = "";

    function __construct() {
        // Usamos las constantes definidas en /config/db_conf.php
        // El @ delante de new mysqli oculta errores feos de PHP para gestionarlos nosotros.
        $this->conexion = @new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->conexion->connect_errno) {
            $this->error = true;
            $this->mensaje_error = "Error fatal de conexión: " . $this->conexion->connect_error;
            // En producción, aquí podríamos guardar el error en un archivo log.
        } else {
            // Forzamos UTF-8 para que las tildes y eñes se vean bien
            $this->conexion->set_charset("utf8");
        }
    }

    /**
     * Método Genérico para Consultas (SELECT, INSERT, UPDATE, DELETE)
     * Recibe el SQL y devuelve el objeto resultado.
     */
    public function consulta($sql) {
        if ($this->error) return null;

        $resultado = $this->conexion->query($sql);

        if (!$resultado) {
            // Si la consulta falla (ej: tabla no existe), guardamos el error
            $this->mensaje_error = "Error SQL: " . $this->conexion->error;
            return null;
        }
        
        return $resultado;
    }

    /**
     * Método para limpiar datos de entrada (Seguridad)
     * Evita inyección SQL básica cuando buscamos texto.
     */
    public function escapar($dato) {
        return $this->conexion->real_escape_string($dato);
    }
}
?>