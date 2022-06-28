<?php

require_once('./database/database.php');
class ProductoModel{
    

    

    public static  function ExisteProducto($codigo_producto){
        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL ObtenerProducto(?)");
        $stmt->bind_param("s",$codigo_producto);
        $stmt->execute();
        $stmt = $stmt->get_result();
        if($stmt->num_rows == 1){
            return true;
        }
        return false;
    }
    public static function ObtenerProducto($codigo_producto){
        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL ObtenerProducto(?)");
        $stmt->bind_param("s",$codigo_producto);
        $stmt->execute();
        $stmt = $stmt->get_result();
        return $stmt->fetch_assoc();
    }

    public static function RegistrarProducto($producto){
        $codigo_producto = $producto->getCodigoProducto();
        $descripcion = $producto->getDescripcion();
        $presentacion = $producto->getPresentacion();
        $cantidad = $producto->getCantidad();
        $precio = $producto->getPrecio();

        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL RegistrarProducto(?,?,?,?,?)");
        $stmt->bind_param("sssid",$codigo_producto,$descripcion,$presentacion,$cantidad,$precio);
        $stmt->execute();

    }

    public static function ModificarProducto($producto){
        $codigo_producto = $producto->getCodigoProducto();
        $descripcion = $producto->getDescripcion();
        $presentacion = $producto->getPresentacion();
        $cantidad = $producto->getCantidad();
        $precio = $producto->getPrecio();

        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL ModificarProducto(?,?,?,?,?)");
        $stmt->bind_param("sssid",$codigo_producto,$descripcion,$presentacion,$cantidad,$precio);
        $stmt->execute();
    }

    public static function EliminarProducto($codigo_producto){
        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL EliminarProducto(?)");
        $stmt->bind_param("s",$codigo_producto);
        $stmt->execute();
        if(sizeof($stmt->error_list) == 0){
            return true;
        }
        return false;
    }

    public static function ObtenerCantidadProductos(){
        $connection = new Database();
        $stmt = $connection->getConnection()->query("CALL ObtenerCantidadProductos()");
        return $stmt->fetch_assoc();
    }
    public static function ObtenerProductosPorPagina($pagina){
        $rango_superior = $pagina * 5;
        $rango_inferior = $rango_superior - 5;

        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL ObtenerProductosRango(?,?)");
        $stmt->bind_param("ii",$rango_inferior,$rango_superior);
        $stmt->execute();
        $stmt = $stmt->get_result();
        $productos = array();
        while($fila = $stmt->fetch_assoc()){
            array_push($productos,$fila);
        }
        return $productos;
    }
    


}


?>