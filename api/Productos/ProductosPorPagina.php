<?php
header('Content-type: application/json');
include('./Controller/Producto.php');
echo(json_encode(ProductoController::ObtenerProductosPorPagina($pagina)));
exit();
?>