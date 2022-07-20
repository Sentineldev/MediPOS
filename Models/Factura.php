<?php
require_once('./database/database.php');
class FacturaModel{


    public static function GuardarFactura($monto,$id_cliente,$id_usuario,$id_establecimiento){
        try{
            $connection = new Database();
            $stmt = $connection->getConnection()->prepare("CALL GuardarFactura(?,?,?,?)");
            $stmt->bind_param("dssi",$monto,$id_cliente,$id_usuario,$id_establecimiento);
            $stmt->execute();
            $connection->close_connection();
            return 1;
        }catch(Exception $e){
            return 0;
        }
    }


    private static Function ObtenerUltimaFactura(){
        $connection = new Database();
        $stmt = $connection->getConnection()->query("CALL ObtenerUltimaFactura()");

        $connection->close_connection();
        return $stmt->fetch_assoc();
    }
    public static function GuardarProductoFactura($productos){
        $last_index = FacturaModel::ObtenerUltimaFactura()['id_factura'];
        foreach ($productos as $key => $value) {
            $connection = new Database();
            $stmt = $connection->getConnection()->prepare("CALL GuardarProductoFactura(?,?,?)");
            $stmt->bind_param("isd",$last_index,$value->codigo_producto,$value->cantidad);
            $stmt->execute();
            $connection->close_connection();
        }
    }

    public static function GuardarPagoFactura($pagos){
        $last_index = FacturaModel::ObtenerUltimaFactura()['id_factura'];
        foreach ($pagos as $key => $value) {
            $connection = new Database();
            $stmt = $connection->getConnection()->prepare("CALL GuardarPagoFactura(?,?,?)");
            $stmt->bind_param("iid",$last_index,$value->tipo_pago,$value->monto);
            $stmt->execute();
            $connection->close_connection();
        }
    }

    private static function ObtenerFactura($id_factura){
        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL ObtenerFactura(?)");
        $stmt->bind_param("i",$id_factura);
        $stmt->execute();

        $stmt = $stmt->get_result();
        return $stmt->fetch_assoc();
        
    }


    private static function ObtenerEstablecimiento($id_establecimiento){
        $connection = new Database();
        $stmt = $connection->getConnection()->prepare("CALL ObtenerEstablecimiento(?)");
        $stmt->bind_param("i",$id_establecimiento);
        $stmt->execute();
        $stmt = $stmt->get_result();
        return $stmt->fetch_assoc();
    }

    private static function WriteIntoFile($id_factura,$usuario,$cliente,$productos,$pagos,$id_establecimiento){
        $factura = FacturaModel::ObtenerFactura($id_factura);
        $establecimiento = FacturaModel::ObtenerEstablecimiento($id_establecimiento);
        $file = fopen("./facturas_impresas"."/factura_".$id_factura.".txt",'w');

        fwrite($file,"\t\t".$establecimiento['nombre']);
        fwrite($file,"\nTelefono: ".$establecimiento['telefono']);
        fwrite($file,"\nDireccion: ".$establecimiento['direccion']);
        fwrite($file,"\nREF: ".$id_factura);
        fwrite($file,"\nOperador: ".$usuario['nombre']." ".$usuario['apellido']);
        if(isset($client->apellido)){
            fwrite($file,"\nNombre: ".$cliente->nombre." ".$cliente->apellido);
        }
        else{
            fwrite($file,"\nNombre: ".$cliente->nombre);
        }
        fwrite($file,"\nRIF/CEDULA: ".$cliente->identificacion);
        fwrite($file,"\n-----------------------------------------------------------------------------------");
        foreach ($productos as $key => $value) {
            fwrite($file,"\n".$value->descripcion);
            fwrite($file,"\n".$value->precio." X ".$value->cantidad);
        }
        fwrite($file,"\n-----------------------------------------------------------------------------------");
        fwrite($file,"\nTotal Cancelado: ".$factura['monto']);
        fwrite($file,"\n-----------------------------------------------------------------------------------");
        foreach ($pagos as $key => $value) {
            fwrite($file,"\n".$value->nombre_tipo_pago.": ".$value->monto);
        }
        fclose($file);
    }

    public static function PrintFactura($usuario,$cliente,$establecimiento,$productos,$pagos){
        $last_index = FacturaModel::ObtenerUltimaFactura()['id_factura'];
        
        FacturaModel::WriteIntoFile($last_index,$usuario,$cliente,$productos,$pagos,$establecimiento);
    }   
}

?>
