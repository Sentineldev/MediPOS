<?php
class Producto{

    private string $codigo_producto;
    private string $descripcion;
    private string $presentacion;
    private int $cantidad;
    private float $precio;

    function __construct($codigo_producto,$descripcion,$presentacion,$cantidad,$precio){
        $this->codigo_producto = $codigo_producto;
        $this->descripcion = $descripcion;
        $this->presentacion = $presentacion;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
    }

    function getCodigoProducto(){
        return $this->codigo_producto;
    }

    function getDescripcion(){
        return $this->descripcion;
    }
    function getPresentacion(){
        return $this->presentacion;
    }
    function getCantidad(){
        return $this->cantidad;
    }
    function getPrecio(){
        return $this->precio;
    }
}


?>