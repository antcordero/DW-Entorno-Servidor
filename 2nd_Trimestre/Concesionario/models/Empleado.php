<?php
require_once 'Db.php';

class Empleado extends Db {
    
    function __construct() {
        parent::__construct();
    }
    /**
     * Obtiene la lista de todos los trabajadores
     */
    public function getTodos() {
        $sql = "SELECT * FROM empleados ORDER BY id DESC"; // Los nuevos primero
        $resultado = $this->consulta($sql);
        $empleados = [];
        while ($row = $resultado->fetch_assoc()) {
            $empleados[] = $row;
        }
        return $empleados;
    }
    /**
     * --- RETO PENDIENTE PARA EL ALUMNO ---
     * Calcular la suma de todos los sueldos.
     */
    public function getGastoTotalSueldos() {
        // PISTA: $sql = "SELECT SUM(sueldo) ... ";
        return 0; 
    }
      * --- NUEVO: CONTRATAR EMPLEADO ---
     * Guarda un nuevo trabajador en la base de datos.
     */
    public function insertar($nombre, $cargo, $email, $sueldo) {
        // 1. SANITIZACIÓN (Limpieza de datos)
        // Usamos el método 'escapar' del Padre (Db) para evitar que nos hackeen con SQL Injection
        $n = $this->escapar($nombre);
        $c = $this->escapar($cargo);
        $e = $this->escapar($email);
        $s = (float) $sueldo; // Forzamos a que sea número decimal

        // 2. PREPARAR SQL
        $sql = "INSERT INTO empleados (nombre, cargo, email, sueldo) 
                VALUES ('$n', '$c', '$e', $s)";

        // 3. EJECUTAR
        return $this->consulta($sql);
    }       
}
?>