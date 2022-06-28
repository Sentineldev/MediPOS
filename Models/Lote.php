<?php
require_once('./database/database.php');
class LoteModel{


    public static function ExisteLote($numero_lote){
        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("Call ObtenerLote(?)");
        $stmt->bind_param("i",$numero_lote);
        $stmt->execute();
        $stmt = $stmt->get_result();
        if($stmt->num_rows == 1){
            return true;
        }
        return false;
    }

    public static function ObtenerLote($numero_lote){
        $connection = new Database();
        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("Call ObtenerLote(?)");
        $stmt->bind_param("i",$numero_lote);
        $stmt->execute();
        $stmt = $stmt->get_result();
        return $stmt->fetch_assoc();
    }

    public static function RegistrarLote($lote){
        $codigo_producto = $lote->getCodigoProducto();
        $numero_lote = $lote->getNumeroLote();
        $cantidad = $lote->getCantidad();
        $precio = $lote->getPrecio();
        $fecha_entrada = $lote->getFechaEntrada();
        $fecha_vencimiento = $lote->getFechaVencimiento();

        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL RegistrarLote(?,?,?,?,?,?)");
        $stmt->bind_param("siidss",$codigo_producto,$numero_lote,$cantidad,$precio,$fecha_entrada,$fecha_vencimiento);
        $stmt->execute();
    }

    public static function ModificarLote($lote){
        $numero_lote = $lote->getNumeroLote();
        $cantidad = $lote->getCantidad();
        $precio = $lote->getPrecio();
        $fecha_entrada = $lote->getFechaEntrada();
        $fecha_vencimiento = $lote->getFechaVencimiento();

        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL ModificarLote(?,?,?,?,?)");
        $stmt->bind_param("iidss",$numero_lote,$cantidad,$precio,$fecha_entrada,$fecha_vencimiento);
        $stmt->execute();
    }
    public static function EliminarLote($numero_lote){
        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL EliminarLote(?)");
        $stmt->bind_param("i",$numero_lote);
        $stmt->execute();
    }

    public static function ObtenerCantidadLotes(){
        $connection = new Database();
        $stmt = $connection->getConnection()->query("CALL ObtenerCantidadLotes()");
        return $stmt->fetch_assoc();
    }

    public static function ObtenerLotesPorPagina($pagina){
        $rango_superior = $pagina * 5;
        $rango_inferior = $rango_superior - 5;
        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL ObtenerLotesRango(?,?)");
        $stmt->bind_param("ii",$rango_inferior,$rango_superior);
        $stmt->execute();
        $stmt = $stmt->get_result();
        $lotes = array();
        while($fila = $stmt->fetch_assoc()){
            array_push($lotes,$fila);
        }
        return $lotes;
    }
}

?>