<?php
require_once 'Db.php';

class Pieza extends Db {

    public function __construct() {
        parent::__construct();
    }

    public function getTodos() {
        $sql = "SELECT * FROM piezas ORDER BY nombre ASC";
        $resultado = $this->consulta($sql);

        $piezas = [];
        if ($resultado) {
            while ($row = $resultado->fetch_assoc()) {
                $piezas[] = $row;
            }
        }
        return $piezas;
    }

    public function getById($id) {
        $idLimpio = (int)$id;
        $sql = "SELECT * FROM piezas WHERE id = $idLimpio";
        $res = $this->consulta($sql);
        return ($res && $res->num_rows === 1) ? $res->fetch_assoc() : null;
    }

    public function crear($nombre, $referencia, $precio, $stock, $ubicacion) {
        $n = $this->escapar($nombre);
        $r = $this->escapar($referencia);
        $u = $this->escapar($ubicacion);
        $p = (float)$precio;
        $s = (int)$stock;

        $sql = "INSERT INTO piezas (nombre, referencia, precio, stock, ubicacion)
                VALUES ('$n', '$r', $p, $s, '$u')";
        return $this->consulta($sql);
    }

    public function actualizar($id, $nombre, $referencia, $precio, $stock, $ubicacion) {
        $idLimpio = (int)$id;
        $n = $this->escapar($nombre);
        $r = $this->escapar($referencia);
        $u = $this->escapar($ubicacion);
        $p = (float)$precio;
        $s = (int)$stock;

        $sql = "UPDATE piezas
                SET nombre = '$n',
                    referencia = '$r',
                    precio = $p,
                    stock = $s,
                    ubicacion = '$u'
                WHERE id = $idLimpio";
        return $this->consulta($sql);
    }

    public function borrar($id) {
        $idLimpio = (int)$id;
        $sql = "DELETE FROM piezas WHERE id = $idLimpio";
        return $this->consulta($sql);
    }
}
?>
