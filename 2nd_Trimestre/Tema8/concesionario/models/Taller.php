<?php
require_once 'Db.php';

class Taller extends Db {
    
    function __construct() {
        parent::__construct();
    }

    /**
     * Listar citas pendientes o en proceso
     */
    public function getCitasActivas() {
        // Filtramos para no ver las terminadas
        $sql = "SELECT * FROM citas WHERE estado != 'Terminado' ORDER BY fecha ASC";
        $resultado = $this->consulta($sql);
        
        $citas = [];
        while ($row = $resultado->fetch_assoc()) {
            $citas[] = $row;
        }
        return $citas;
    }

    /**
     * Método para cambiar el estado de una cita (Ej: de Pendiente a Terminado)
     */
    public function cambiarEstado($id, $nuevoEstado) {
        // Saneamos datos por seguridad
        $estadoLimpio = $this->escapar($nuevoEstado);
        $idLimpio = (int)$id;

        $sql = "UPDATE citas SET estado = '$estadoLimpio' WHERE id = $idLimpio";
        return $this->consulta($sql);
    }
}
?>