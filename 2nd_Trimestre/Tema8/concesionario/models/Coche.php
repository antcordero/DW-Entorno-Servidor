<?php
require_once 'Db.php';

class Coche extends Db {
    
    public function __construct() {
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
        if ($resultado) {
            while ($row = $resultado->fetch_assoc()) {
                $coches[] = $row;
            }
        }
        return $coches;
    }

    /**
     * Obtiene solo los coches marcados como DESTACADOS (VIP)
     */
    public function getDestacados() {
        $sql = "SELECT * FROM coches WHERE destacado = 1 ORDER BY precio DESC";
        $resultado = $this->consulta($sql);
        
        $coches = [];
        if ($resultado) {
            while ($row = $resultado->fetch_assoc()) {
                $coches[] = $row;
            }
        }
        return $coches;
    }

    /**
     * Obtener un coche por ID (para la ficha de detalle)
     */
    public function getById($id) {
        $idLimpio = (int)$id;
        $sql = "SELECT * FROM coches WHERE id = $idLimpio";
        $res = $this->consulta($sql);
        return ($res && $res->num_rows === 1) ? $res->fetch_assoc() : null;
    }

    /**
     * Soft delete: marcar coche como vendido
     */
    public function marcarVendido($id) {
        $idLimpio = (int)$id;
        $sql = "UPDATE coches SET vendido = 1 WHERE id = $idLimpio";
        return $this->consulta($sql);
    }
}
?>
