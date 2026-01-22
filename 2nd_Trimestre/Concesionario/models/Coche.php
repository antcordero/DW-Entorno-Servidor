<?php
require_once 'Db.php';

class Coche extends Db {
    function __construct() {
        parent::__construct();
    }
/**
     * Obtiene todos los coches del inventario
*/
    public function getTodos() {
        // Ordenamos por precio descendente (los caros primero)
        $sql = "SELECT * FROM coches ORDER BY precio DESC";
        $resultado = $this->consulta($sql);
        
        $coches = [];
        while ($row = $resultado->fetch_assoc()) {
            $coches[] = $row;
        }
        return $coches;
    }
     /**
     * Obtiene solo los coches marcados como DESTACADOS (VIP)
     * Ideal para un carrusel o portada.
     */
    public function getDestacados() {
        $sql = "SELECT * FROM coches WHERE destacado = 1";
        $resultado = $this->consulta($sql);
        
        $coches = [];
        while ($row = $resultado->fetch_assoc()) {
            $coches[] = $row;
        }
        return $coches;
    }

}
?>