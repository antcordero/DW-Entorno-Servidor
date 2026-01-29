<?php
/**
 * Permitir la conexion contra la base de datos
 */
class dbTienda
{
    //Atributos necesarios para la conexion
    private $host="localhost";
    private $user="root";
    private $pass="";
    private $db_name="tienda";

    //Conector
    private $conexion;

    //Propiedades para controlar errores
    private $error=false;

    function __construct()
    {
        $this->conexion = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->db_name
        );
        if ($this->conexion->connect_errno) {
            $this->error=true;
        }
    }

    /**
     * Función para listar los productos de la base de datos
     *
     * @return void
     */
    public function listaProductos()
    {
        if ($this->error) return null;
        $sql = "SELECT * FROM productos";
        $resultado = $this->conexion->query($sql); //Ejecuta la consulta
        $productos = []; //Array vacío
        while ($fila = $resultado->fetch_assoc()) {
            $productos[] = $fila;
        }
        return $productos; //Devuelve el array (limpio) con los productos obtenidos de la BD
    }

    /**
     * Función para insertar un nuevo producto en la base de datos
     */
    public function insertarProducto($nombre, $precio, $stock) {
        if ($this->error) return false;
            $sql = "INSERT INTO productos (id, nombre, precio, stock) VALUES (NULL, '".$nombre."', '".$precio."', ".$stock.")";
        return $this->conexion->query($sql);  //Sin funciona devuelve true, sino false -> lo devuelve directamente
    }

    /**
     * Función para buscar producto por id
     */
    public function buscarPorId($id){
    if($this->error) return false;
        $sql = "SELECT * FROM productos WHERE id=$id";
        $resultado= $this->conexion->query($sql);
    return $resultado->fetch_assoc();
}

    
    /**
     * Función para actualizar un producto
     */
    public function actualizar($id,$nombre,$precio,$stock){
        if($this->error) return false;
        $sql = "UPDATE productos SET nombre='$nombre',precio=$precio,stock=$stock WHERE id=$id";
        $resultado= $this->conexion->query($sql);
    }

    /**
     * Función para borrar
     */
    public function borrarProducto($id){
        if($this->error) return false;
        $sql = "DELETE FROM productos WHERE id=$id";
        $resultado= $this->conexion->query($sql);
    }

}