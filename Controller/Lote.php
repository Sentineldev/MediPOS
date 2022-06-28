<?php
require('./Models/Lote.php');
class LoteController{


    public static function ExisteLote($numero_lote){
        return LoteModel::ExisteLote($numero_lote);
    }
    public static function ObtenerLote($numero_lote){
        return LoteModel::ObtenerLote($numero_lote);
    }
    public static function RegistrarLote($lote){
        LoteModel::RegistrarLote($lote);
    }
    public static function ModificarLote($lote){
        LoteModel::ModificarLote($lote);
    }
    public static function EliminarLote($numero_lote){
        LoteModel::EliminarLote($numero_lote);
    }

    public static function ObtenerLotesPorPagina($pagina){
        return LoteModel::ObtenerLotesPorPagina($pagina);
    }
    public static function ObtenerCantidadLotes(){
        return LoteModel::ObtenerCantidadLotes();
    }
}


?>