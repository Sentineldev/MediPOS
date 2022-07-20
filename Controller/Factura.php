<?php

include_once('./Models/Factura.php');
class FacturaController{


    public static function GuardarFactura($monto,$id_cliente,$id_usuario,$id_establecimiento){
        FacturaModel::GuardarFactura($monto,$id_cliente,$id_usuario,$id_establecimiento);
    }


   public static function GuardarProductoFactura($productos){
    FacturaModel::GuardarProductoFactura($productos);
   }
   public static function GuardarPagoFactura($pagos){
    FacturaModel::GuardarPagoFactura($pagos);
   }
   public static function PrintFactura($id_usuario,$id_cliente,$id_establecimiento,$productos,$pagos){
    FacturaModel::PrintFactura($id_usuario,$id_cliente,$id_establecimiento,$productos,$pagos);
   }

}

?>
