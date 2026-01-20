<?php
/**
 * Permitir la conexion contra la base de datos
 */
class dbUsuarios
{
    // Atributos necesarios para la conexion
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db_name = "tienda";

    // Conector
    private $conexion;

    // Propiedades para controlar errores
    private $error = false;

    function __construct()
    {
        $this->conexion = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->db_name
        );
        if ($this->conexion->connect_errno) {
            $this->error = true;
        }
    }
}
