<?php 
require('./Models/Producto.php');
class ProductoController{


    public static function ExisteProducto($codigo_producto){
        return ProductoModel::ExisteProducto($codigo_producto);
    }

    public static function ObtenerProducto($codigo_producto){
        return ProductoModel::ObtenerProducto($codigo_producto);
    }

    public static function RegistrarProducto($producto){
        ProductoModel::RegistrarProducto($producto);
    }
    public static function ModificarProducto($producto){
        ProductoModel::ModificarProducto($producto);
    }
    public static function EliminarProducto($codigo_producto){
        return ProductoModel::EliminarProducto($codigo_producto);
    }
    public static function ObtenerProductosPorPagina($pagina){
        return ProductoModel::ObtenerProductosPorPagina($pagina);
    }
    public static function ObtenerCantidadProductos(){
        return ProductoModel::ObtenerCantidadProductos();
    }
}


?>