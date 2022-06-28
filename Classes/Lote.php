<?php
class Lote{

    private string $codigo_producto;
    private int $numero_lote;
    private int $cantidad;
    private float $precio;
    private string $fecha_entrada;
    private string $fecha_vencimiento;

    function __construct($codigo_producto,$numero_lote,$cantidad,$precio,$fecha_entrada,$fecha_vencimiento){
        $this->codigo_producto = $codigo_producto;
        $this->numero_lote = $numero_lote;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->fecha_entrada = $fecha_entrada;
        $this->fecha_vencimiento = $fecha_vencimiento;
    }

    function getCodigoProducto(){
        return $this->codigo_producto;
    }
    function getNumeroLote(){
        return $this->numero_lote;
    }
    function getCantidad(){
        return $this->cantidad;
    }
    function getPrecio(){
        return $this->precio;
    }
    function getFechaEntrada(){
        return $this->fecha_entrada;
    }
    function getFechaVencimiento(){
        return $this->fecha_vencimiento;
    }
}


?>